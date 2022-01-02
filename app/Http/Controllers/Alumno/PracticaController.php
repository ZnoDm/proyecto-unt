<?php

namespace App\Http\Controllers\Alumno;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Empresa;
use App\Models\Fut;
use App\Models\Practica;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PracticaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Tramite Practica')->only('index','create','store','edit','show','update');
    }
    //ESTADOS DE LA PRACTICA 1=EN REVISION, 2=APROBADA, 3= RECHAZADA, 4=FINALIZADA, 5=INFORME FINAL.
    //DOCENTE 1= ASESORES DE PRACTICAS
    public function index()
    {
        $alumno = Alumno::firstWhere(['alumno_email'=>auth()->user()->email]);
        $practicas = Practica::where('alumno_id',$alumno->id)->get();
        return view('alumno.practica.index',compact('practicas'));
    }

    public function create()
    {
        $docentes = Docente::where('docente_status','3')->orWhere('docente_status','1')->get();
        return view('alumno.practica.create',compact('docentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nro' => 'required|unique:vouchers,voucher_nro',
            'file_voucher' => 'required',
            
            'file_fut' => 'required',

            'fecha_inicio' => 'required',
            'fecha_fin' =>[
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ((strtotime($value) - strtotime($request->fecha_inicio))/3600 < 600) {
                        $fail('Fecha no válida. Se debe cumplir un minimo de 600 horas.');
                    }
                }],       
            
            'file_practica' => 'required',

            'docente_id'=>[
                function ($attribute, $value, $fail) use ($request) {
                if ($value == -1) {
                    $fail('Seleccione un docente.');
                }
            }],
            'ruc' => 'required',
            'nombre' => 'required',
            'representante' => 'required',
            'supervisor' => 'required',
            'telefono' => 'required',
        ]);
        $alumno = Alumno::firstWhere(['alumno_email'=>auth()->user()->email]);

        $file_voucher = $request->file('file_voucher')->store('public/practicas/vouchers');
        $url_file_voucher =Storage::url($file_voucher);
        $voucher = Voucher::create([
            'voucher_nro' => $request->nro,
            'voucher_url' => $url_file_voucher,
        ]);

        $file_fut = $request->file('file_fut')->store('public/practicas/futs');
        $url_file_fut =Storage::url($file_fut);
        $fut = Fut::create([
            'fut_url' => $url_file_fut,
        ]);

        $empresa = Empresa::create([            
            'empresa_ruc' => $request->ruc,
            'empresa_razonsocial' => $request->nombre,
            'empresa_representante' => $request->representante,
            'empresa_supervisor' => $request->supervisor,
            'empresa_telefono' => $request->telefono,
        ]);
        $file_practica =$request->file('file_practica')->store('public/practicas/planes');
        $url_file_practica =Storage::url($file_practica);
        $practica = Practica::create([            
            'practica_fechainicio' => $request->fecha_inicio,            
            'practica_fechafin' => $request->fecha_fin,
            'practica_file_practica_url' => $url_file_practica,
            'empresa_id' =>$empresa->id,
            'alumno_id' =>$alumno->id,
            'docente_id' =>$request->docente_id,
            'practica_status' =>1,
        ]);
        DB::table('fut_practica')->insert([
            'detalle'=>'SOLICITUD PRACTICA',
            'practica_id'=>$practica->id,
            'fut_id'=>$fut->id
        ]);
        DB::table('practica_voucher')->insert([
            'detalle'=>'SOLICITUD PRACTICA',
            'practica_id'=>$practica->id,
            'voucher_id'=>$voucher->id
        ]);

        return redirect()->route('tramite.practica.index')->with('info','Su solicitud fue enviada con éxito!');
        
    }
    //VER PROGRESO
    public function show(Practica $practica)
    {
        return view('alumno.practica.progreso',compact('practica')); 
    }

    public function edit(Practica $practica)
    {
        $docentes = Docente::where('docente_status','3')->orWhere('docente_status','1')->get();
        $observacion = DB::table('practica_observaciones')->where('practica_id',$practica->id)->latest('id')->first();
        return view('alumno.practica.edit',compact('practica','docentes','observacion'));        
    }

    public function update(Request $request, Practica $practica)
    {
        //Denego el director 
        if($practica->practica_status==9){
            $request->validate([
                'file_practica' => 'required',
                
            ]);
            $file_practica = $request->file('file_practica')->store('public/practicas/planes');
            $url_file_practica =Storage::url($file_practica);
            $practica->update([
                'practica_file_practica_url' => $url_file_practica,
                'practica_status' => 2
            ]);
        //Denego la secretaria status=8 o primera vez que envia
        }else{            
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
                'ruc' => 'required',
                'nombre' => 'required',
                'representante' => 'required',
                'supervisor' => 'required',
                'telefono' => 'required',
                
            ]);
            $practica->empresa()->update([
                'empresa_ruc' => $request->ruc,
                'empresa_razonsocial' => $request->nombre,
                'empresa_representante' => $request->representante,
                'empresa_supervisor' => $request->supervisor,
                'empresa_telefono' => $request->telefono,
            ]);
    
            if($request->file('file_practica')){
                $file_practica = $request->file('file_practica')->store('public/practicas/planes');
                $url_file_practica =Storage::url($file_practica);
                $practica->update([
                    'practica_file_practica_url' => $url_file_practica,
                ]);
            }
    
            if($request->file('file_voucher') || $practica->vouchers->first()->voucher_nro != $request->nro){
                
                $request->validate([ 'file_voucher' => 'required']); 
                $file_voucher = $request->file('file_voucher')->store('public/practicas/vouchers');
                $url_file_voucher =Storage::url($file_voucher);
    
                if($practica->vouchers->first()->voucher_nro == $request->nro){
                    Storage::delete($practica->vouchers->first()->voucher_url);
                    $practica->vouchers->first()->update([
                        'voucher_url' => $url_file_voucher,
                    ]);
                }else{
                    $practica->vouchers->first()->update([                    
                        'voucher_nro' => $request->nro,
                        'voucher_url' => $url_file_voucher,
                    ]);
                }
            }
    
            if($request->file('file_fut')){
                Storage::delete($practica->futs->first()->voucher_url);
                $file_fut = $request->file('file_fut')->store('public/practicas/futs');
                $url_file_fut =Storage::url($file_fut);
                $practica->futs->first()->update([                    
                    'fut_url' => $url_file_fut,
                ]);
            }
            $practica->update([
                'practica_fechainicio' => $request->fecha_inicio,
                'practica_fechafin' => $request->fecha_fin,
                'practica_status' => 1,
                'docente_id' => $request->docente_id,
                'practica_status' => 1
            ]);
        }
        return redirect()->route('tramite.practica.index')->with('info','Su solicitud fue actualizada con éxito!');
    }

    public function destroy($id)
    {
        //
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
            'detalle'=>'INFORME FINAL PRACTICA',
            'practica_id'=>$practica->id,
            'fut_id'=>$fut->id
        ]);
        DB::table('practica_voucher')->insert([
            'detalle'=>'INFORME FINAL PRACTICA',
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
        $observacion = DB::table('practica_observaciones')->where('practica_id',$practica->id)->latest('id')->first();
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
