<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Observation;
use App\Models\Practica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedPractica;
use App\Mail\DeniedPractica;
use App\Models\Empresa;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //ESTADOS DE LA PRACTICA 1=EN REVISION, 2=APROBADA, 3= RECHAZADA, 4=FINALIZADA.
    public function alumnos ()
    {
        return view('admin.alumnos');
    }
     
    public function voucher(){
        $vouchers=Voucher::all();
        return view('admin.voucher',compact('vouchers'));
    }
    
    public function empresa(){
        $empresas=Empresa::all();
        return view('admin.empresas',compact('empresas'));
    }
    public function grafico1(){
        $consulta=DB::table('alumno_practica')
        ->join('docentes', 'alumno_practica.docente_id', '=', 'docentes.id')
        ->select(DB::raw('count(*) as cantidad, docentes.nombre'))
        ->groupBy('docentes.nombre')
        ->get();
        $puntos = [];
        foreach ($consulta as $c) {
            $puntos[] = ['name' => $c->nombre, 'y' => floatval($c->cantidad)];
        }
        return view('admin.estadistica.docenteasesor', ["date" => json_encode($puntos)]);
    }
    
}
