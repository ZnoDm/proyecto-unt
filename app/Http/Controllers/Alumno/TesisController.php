<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Fut;
use App\Models\Practica;
use App\Models\Tesis;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TesisController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Tramite Tesis')->only('index','create','store','edit','show','update');
    }
    public function index()
    {
        $alumno = Alumno::firstWhere(['alumno_email'=>auth()->user()->email]);
        $tesis = Tesis::where('alumno_id',$alumno->id)->get();
        //VALIDAR SI HA TERMINADO SUS PRACTICAS PARA PODER HACER SU TESIS
        $practica_existe = Practica::where('alumno_id',$alumno->id)->first();
        return view('alumno.tesis.index',compact('tesis','practica_existe'));
    }
    public function create()
    {
        $docentes = Docente::where('docente_status','3')->orWhere('docente_status','2')->get();
        return view('alumno.tesis.create',compact('docentes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nro' => 'required',
            'file_voucher' => 'required',
            
            'file_fut' => 'required',

            'titulo' => 'required',
            'docente_id'=>[
                function ($attribute, $value, $fail) use ($request) {
                if ($value == -1) {
                    $fail('Seleccione un docente.');
                }
            }],           
            'file_tesis' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' =>[
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ((strtotime($value) - strtotime($request->fecha_inicio))/3600 < 600) {
                        $fail('Fecha no válida. Se debe cumplir un minimo de 600 horas.');
                    }
                }],              
            'file_tesis' => 'required',
        ]);

        $alumno = Alumno::firstWhere(['alumno_email'=>auth()->user()->email]);

        $file_voucher = $request->file('file_voucher')->store('public/tesis/vouchers');
        $url_file_voucher =Storage::url($file_voucher);
        $voucher = Voucher::create([
            'voucher_nro' => $request->nro,
            'voucher_url' => $url_file_voucher,
        ]);

        $file_fut = $request->file('file_fut')->store('public/tesis/futs');
        $url_file_fut =Storage::url($file_fut);
        $fut = Fut::create([
            'fut_url' => $url_file_fut,
        ]);

        $file_tesis =$request->file('file_tesis')->store('public/tesis/planes');
        $url_file_tesis =Storage::url($file_tesis);

        $tesis = Tesis::create([
            'tesis_titulo' => $request->titulo,
            'tesis_fechainicio' => $request->fecha_inicio,
            'tesis_fechafin' => $request->fecha_fin,
            'tesis_file_tesis' => $url_file_tesis,
            'tesis_status' =>1,
            'alumno_id' =>$alumno->id,
            'docente_id' =>$request->docente_id,
        ]);

        DB::table('fut_tesis')->insert([
            'detalle'=>'SOLICITUD',
            'tesis_id'=>$tesis->id,
            'fut_id'=>$fut->id
        ]);
        DB::table('tesis_voucher')->insert([
            'detalle'=>'SOLICITUD',
            'tesis_id'=>$tesis->id,
            'voucher_id'=>$voucher->id
        ]);

        return redirect()->route('tesis.index')->with('info','Su solicitud fue enviada con éxito!');
    }
    //PROGRESO
    public function show(Tesis $tesi)
    {
        return view('alumno.tesis.progreso',compact('tesis'));
    }
    public function edit($id)
    {
        $docentes = Docente::where('docente_status','3')->orWhere('docente_status','2')->get();
        $tesis = Tesis::find($id);
        return view('alumno.tesis.edit',compact('docentes','tesis'));
    }
    public function update(Request $request,Tesis $tesi)
    {
        $request->validate([  
            'nro' => 'required',
            'fecha_inicio' => ['required',
                function ($attribute, $value, $fail) use ($request) {
                if ($value < date('Y-m-d')) {
                    $fail('Fecha no válida. La fecha no puede ser menor a la actual.');
                }
                }],
            'fecha_fin' =>[
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value < $request->fecha_inicio) {
                        $fail('Fecha no válida. La fecha final, debe ser posterior a la fecha inicial.');
                    }
                },
                function ($attribute, $value, $fail) use ($request) {
                    if ((strtotime($value) - strtotime($request->fecha_inicio))< 600) {
                        $fail('Fecha no válida. Se debe cumplir un minimo de 600 horas.');
                    }
                }],             

            'docente_id'=>[
                function ($attribute, $value, $fail) use ($request) {
                if ($value == -1) {
                    $fail('Seleccione un docente.');
                }
            }],
            'titulo'=> 'required',

        ]);   

        if($request->file('file_tesis')){
            $file_tesis = $request->file('file_tesis')->store('public/tesis/planes');
            $url_file_tesis =Storage::url($file_tesis);
            $tesi->update([
                'tesis_file_tesis' => $url_file_tesis,
            ]);
        }

        if($request->file('file_voucher') || $tesi->vouchers->first()->voucher_nro != $request->nro){
            
            $request->validate([ 'file_voucher' => 'required' ]); 
            $file_voucher = $request->file('file_voucher')->store('public/tesis/vouchers');
            $url_file_voucher =Storage::url($file_voucher);

            if($tesi->vouchers->first()->voucher_nro == $request->nro){
                Storage::delete($tesi->vouchers->first()->voucher_url);
                $tesi->vouchers->first()->update([
                    'voucher_url' => $url_file_voucher,
                ]);
            }else{
                $tesi->vouchers->first()->update([                    
                    'voucher_nro' => $request->nro,
                    'voucher_url' => $url_file_voucher,
                ]);
            }
        }

        if($request->file('file_fut')){
            Storage::delete($tesi->futs->first()->voucher_url);
            $file_fut = $request->file('file_fut')->store('public/tesis/futs');
            $url_file_fut =Storage::url($file_fut);
            $tesi->futs->first()->update([                    
                'fut_url' => $url_file_fut,
            ]);
        }

        $tesi->update([
            'tesis_titulo' => $request->titulo,
            'tesis_fechainicio' => $request->fecha_inicio,
            'tesis_fechafin' => $request->fecha_fin,
        ]);
        

        return redirect()->route('tesis.index')->with('info','Su solicitud fue actualizada con éxito!');
    }
    public function destroy($id)
    {
        //
    }

    public function informefinal(Request $request,$id){
        $request->validate([
            'nro' => 'required|unique:vouchers,voucher_nro',
            'file_voucher' => 'required',
            'file_fut'=>'required',
            'file_informefinal' => 'required',
        ]);

        $file_voucher = $request->file('file_voucher')->store('public/tesis/vouchers');
        $url_file_voucher =Storage::url($file_voucher);

        $file_fut =$request->file('file_fut')->store('public/tesis/futs');
        $url_file_fut =Storage::url($file_fut);

        $file_informefinal = $request->file('file_informefinal')->store('public/tesis/informe-final');
        $url_file_informefinal =Storage::url($file_informefinal);

        $tesis =Tesis::find($id);
        
        $voucher = Voucher::create([
            'voucher_nro' => $request->nro,
            'voucher_url' => $url_file_voucher,
        ]);
        $fut = Fut::create([
            'fut_url' => $url_file_fut,
        ]);
        DB::table('fut_tesis')->insert([
            'detalle'=>'SOLICITUD',
            'tesis_id'=>$tesis->id,
            'fut_id'=>$fut->id
        ]);
        DB::table('tesis_voucher')->insert([
            'detalle'=>'SOLICITUD',
            'tesis_id'=>$tesis->id,
            'voucher_id'=>$voucher->id
        ]);
        $tesis->update([
            'tesis_status' => 4,
            'tesis_file_informefinal'=>$url_file_informefinal,
        ]);
        
        return redirect()->route('tesis.index')->with('info','Informe final enviado con exito!');
    }
    public function informefinalcreate(Practica $practica)
    {
        return view('alumno.practica.informefinal-create',compact('practica'));
    }
    public function informefinalstore(Request $request,Practica $practica)
    {
        $request->validate([
            'nro' => 'required|unique:vouchers,voucher_nro',
            'file_voucher' => 'required',
            'file_fut'=>'required',
            'file_informefinal' => 'required',
            'file_certificado' => 'required',
        ]);    
        $file_voucher = $request->file('file_voucher')->store('public/practicas/vouchers');
        $url_file_voucher =Storage::url($file_voucher);

        $file_fut =$request->file('file_fut')->store('public/practicas/futs');
        $url_file_fut =Storage::url($file_fut);

        $file_informefinal = $request->file('file_informefinal')->store('public/practicas/informe-final');
        $url_file_informefinal =Storage::url($file_informefinal);

        $file_certificado = $request->file('file_certificado')->store('public/practicas/certificados');
        $url_file_certificado =Storage::url($file_certificado);

        $voucher = Voucher::create([
            'voucher_nro' => $request->nro,
            'voucher_url' => $url_file_voucher,
        ]);
        $fut = Fut::create([
            'fut_url' => $url_file_fut,
        ]);
        DB::table('fut_practica')->insert([
            'detalle'=>'INFORME FINAL',
            'practica_id'=>$practica->id,
            'fut_id'=>$fut->id
        ]);
        DB::table('practica_voucher')->insert([
            'detalle'=>'INFORME FINAL',
            'practica_id'=>$practica->id,
            'voucher_id'=>$voucher->id
        ]);
        $practica->update([
            'practica_status' => 4,
            'practica_file_informe_final_url'=>$url_file_informefinal,
            'practica_certificado_url'=> $url_file_certificado
        ]);
        return redirect()->route('tramite.practica.index')->with('info','Informe final enviado con exito!');
    }
    
    public function informefinaledit(Practica $practica){
        $observacion = DB::table('practica_obervaciones')->where('practica_id',$practica->id)->latest('id')->first();
        return view('alumno.practica.informefinal-edit',compact('practica','observacion'));
    }

    public function informefinalupdate(Request $request, Practica $practica){
        //Denego el director 
        if($practica->practica_status==11){
            $request->validate([
            'file_informefinal' => 'required'
            ]);  
            $file_informefinal = $request->file('file_informefinal')->store('public/practicas/informe-final');
            $url_file_informefinal =Storage::url($file_informefinal);
            $practica->update([
                'practica_status' => 5,
                'practica_file_informe_final_url'=>$url_file_informefinal,
            ]);
        //Denego la secretaria status=10 o primera vez que envia
        }else{            
            $request->validate([ 
                'nro' => 'required',
            ]);
            if($request->file('file_voucher') || $practica->vouchers->last()->voucher_nro != $request->nro){
                
                $request->validate([ 'file_voucher' => 'required']); 
                $file_voucher = $request->file('file_voucher')->store('public/practicas/vouchers');
                $url_file_voucher =Storage::url($file_voucher);
    
                if($practica->vouchers->last()->voucher_nro == $request->nro){
                    Storage::delete($practica->vouchers->last()->voucher_url);
                    $practica->vouchers->last()->update([
                        'voucher_url' => $url_file_voucher,
                    ]);
                }else{
                    $practica->vouchers->last()->update([                    
                        'voucher_nro' => $request->nro,
                        'voucher_url' => $url_file_voucher,
                    ]);
                }
            }
            if($request->file('file_fut')){
                Storage::delete($practica->futs->last()->voucher_url);
                $file_fut = $request->file('file_fut')->store('public/practicas/futs');
                $url_file_fut =Storage::url($file_fut);
                $practica->futs->last()->update([                    
                    'fut_url' => $url_file_fut,
                ]);
            }
            if($request->file('file_informefinal')){
                $file_informefinal = $request->file('file_informefinal')->store('public/practicas/informe-final');
                $url_file_informefinal =Storage::url($file_informefinal);
                $practica->update([
                    'practica_file_practica_url' => $url_file_informefinal,
                ]);
            }
            if($request->file('file_certificado')){
                $file_certificado = $request->file('file_certificado')->store('public/practicas/informe-final');
                $url_file_certificado =Storage::url($file_certificado);
                $practica->update([
                    'practica_certificado_url'=> $url_file_certificado,
                ]);
            }
    
            $practica->update([
                'practica_status' => 4
            ]);
        }
        return redirect()->route('tramite.practica.index')->with('info','Informe final actualizado con exito!');
    }

}
