<?php

namespace App\Http\Controllers\Admin\Secretaria;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Tesis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TesisController extends Controller
{
    //ESTADOS DE LA tesis 1=EN REVISION, 2=APROBADA, 3= RECHAZADA, 4=FINALIZADA, 5=INFORME FINAL.,6 =INFORME DENEGADO
    public function index (Request $request)
    {
        $pordocente =$request->get('pordocente');
        $poralumno =$request->get('poralumno');
        $tesisQuery  = Tesis::with('alumno')
                                ->whereHas('alumno', function  ($query) use ($poralumno) {
                                    $query->where('alumno_nombre','like','%'.$poralumno.'%')
                                    ->orWhere('alumno_apellido','like','%'.$poralumno.'%');
                                })
                                ->with('docente')
                                ->whereHas('docente', function  ($query) use ($pordocente) {
                                    $query->where('docente_nombre','like','%'.$pordocente.'%')
                                    ->orWhere('docente_apellido','like','%'.$pordocente.'%');
                                });
        $porfecha = $request->get('porfecha');
        if ($porfecha==2) {
            $tesisQuery = $tesisQuery->whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))));
        } elseif ($porfecha==3) {
            $tesisQuery = $tesisQuery->whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-30 day', strtotime(date('Y-m-d H:i:s')))));
        }elseif ($porfecha==4) {
            $tesisQuery = $tesisQuery->whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-90 day', strtotime(date('Y-m-d H:i:s')))));
        }elseif ($porfecha==5) {
            $tesisQuery = $tesisQuery->whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-365 day', strtotime(date('Y-m-d H:i:s')))));
        } else {
            /*No haces nada */
        }

        $pordetalle =$request->get('pordetalle');
        if ($pordetalle==2) {
            $tesisQuery = $tesisQuery->where('tesis_status',1);
        } elseif ($pordetalle==3) {
            $tesisQuery = $tesisQuery->where('tesis_status',4);
        }else {
            $tesisQuery = $tesisQuery->where('tesis_status',1)->orWhere('tesis_status',4);
        }

        
        $orden=$request->get('orden');
        $filtro=$request->get('filtro');
        if($filtro==''){
            $filtro='created_at';
            $orden='asc';
        }

        $tesis= $tesisQuery->orderBy($filtro,$orden)->paginate(5); 
        return view('admin.secretaria.tesis.index',compact('tesis','porfecha','pordetalle','pordocente','poralumno','filtro','orden'));
    }
    public function revision($id)
    {
        $tesis = Tesis::find($id);
        $alumno = Alumno::find($tesis->alumno_id);
        $observacion = DB::table('practica_observaciones')->where('practica_id',$tesis->id)->latest('id')->first();
        return view('admin.secretaria.tesis.revision',compact('tesis','alumno','observacion'));
    }
}
