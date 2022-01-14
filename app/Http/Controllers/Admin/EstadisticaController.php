<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function docenteAsesor(){
        $consulta=DB::table('practicas')
        ->join('docentes', 'practicas.docente_id', '=', 'docentes.id')
        ->select(DB::raw('COUNT(*) as cantidad,docentes.docente_nombre'))
        ->whereNotIn('practicas.practica_status', [1,2])
        ->groupBy('docentes.docente_nombre')
        ->get();
        $labels = [];
        $data = [];
        foreach ($consulta as $c) {
            $labels[] = $c->docente_nombre;
            $data[] = $c->cantidad;
        }


        $consulta2=DB::table('tesis')
        ->join('docentes', 'tesis.docente_id', '=', 'docentes.id')
        ->select(DB::raw('COUNT(*) as cantidad,docentes.docente_nombre'))
        ->whereNotIn('tesis.tesis_status', [1,2])
        ->groupBy('docentes.docente_nombre')
        ->get();
        $labels2 = [];
        $data2 = [];
        foreach ($consulta2 as $c) {
            $labels2[] = $c->docente_nombre;
            $data2[] = $c->cantidad;
        }

        $consulta3=DB::table('jurado_observaciones')
        ->join('jurados', 'jurados.id', '=', 'jurado_observaciones.jurado_id')
        ->join('docentes', 'jurados.docente_id', '=', 'docentes.id')
        ->select(DB::raw('COUNT(*) as cantidad,docentes.docente_nombre'))
        ->groupBy('docentes.docente_nombre')
        ->get();
        $labels3 = [];
        $data3 = [];
        foreach ($consulta3 as $c) {
            $labels3[] = $c->docente_nombre;
            $data3[] = $c->cantidad;
        }
        return view('admin.estadistica.docenteasesor',compact('labels','data','labels2','data2','labels3','data3'));
    }
}
