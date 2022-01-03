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
    public function index ()
    {
        
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
