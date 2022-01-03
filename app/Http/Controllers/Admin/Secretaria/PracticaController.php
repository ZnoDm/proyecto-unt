<?php

namespace App\Http\Controllers\Admin\Secretaria;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
class PracticaController extends Controller
{
    //ESTADOS DE LA PRACTICA 1=EN REVISION, 2=APROBADA, 3= RECHAZADA, 4=FINALIZADA, 5=INFORME FINAL.,6 =INFORME DENEGADO
    public function index (Request $request)
    {
        $pordocente =$request->get('pordocente');
        $poralumno =$request->get('poralumno');
        $practicasQuery  = Practica::with('alumno')
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
            $practicasQuery = $practicasQuery->whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))));
        } elseif ($porfecha==3) {
            $practicasQuery = $practicasQuery->whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-30 day', strtotime(date('Y-m-d H:i:s')))));
        }elseif ($porfecha==4) {
            $practicasQuery = $practicasQuery->whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-90 day', strtotime(date('Y-m-d H:i:s')))));
        }elseif ($porfecha==5) {
            $practicasQuery = $practicasQuery->whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-365 day', strtotime(date('Y-m-d H:i:s')))));
        } else {
            /*No haces nada */
        }

        $pordetalle =$request->get('pordetalle');
        if ($pordetalle==2) {
            $practicasQuery = $practicasQuery->where('practica_status',1);
        } elseif ($pordetalle==3) {
            $practicasQuery = $practicasQuery->where('practica_status',4);
        }else {
            $practicasQuery = $practicasQuery->where('practica_status',1)->orWhere('practica_status',4);
        }

        
        $orden=$request->get('orden');
        $filtro=$request->get('filtro');
        if($filtro==''){
            $filtro='created_at';
            $orden='asc';
        }

        $practicas= $practicasQuery->orderBy($filtro,$orden)->paginate(5); 
        return view('admin.secretaria.practica.index',compact('practicas','porfecha','pordetalle','pordocente','poralumno','filtro','orden'));
    }
    public function revision($id)
    {
        $practica = Practica::find($id);
        $alumno = Alumno::find($practica->alumno_id);
        $observacion = DB::table('practica_observaciones')->where('practica_id',$practica->id)->latest('id')->first();
        return view('admin.secretaria.practica.revision',compact('practica','alumno','observacion'));
    }
}
