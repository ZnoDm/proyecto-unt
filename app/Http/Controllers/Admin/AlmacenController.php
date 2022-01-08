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
use App\Models\Docente;
use App\Models\Empresa;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class AlmacenController extends Controller
{
    //ESTADOS DE LA PRACTICA 1=EN REVISION, 2=APROBADA, 3= RECHAZADA, 4=FINALIZADA.
    public function alumnos ()
    {
        return view('admin.almacen.alumnos');
    }
    public function docentes()
    {
        return view('admin.almacen.docentes');
    }

    public function jurados()
    {
        return view('admin.almacen.jurados');
    }

    public function empresas()
    {
        return view('admin.almacen.empresas');
    }

    public function vouchers()
    {
        return view('admin.almacen.vouchers');
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