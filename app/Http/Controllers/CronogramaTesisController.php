<?php

namespace App\Http\Controllers;

use App\Models\CronogramaTesis;
use Illuminate\Http\Request;

class CronogramaTesisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $cronoTesis = CronogramaTesis::where('fecha_inicio', 'like', '%'.$search.'%')
                                        ->paginate(5);
        
        return view('admin.cronogramas.tesis.index', compact('search','cronoTesis'));
    }

    public function create()
    {
        return view('admin.cronogramas.tesis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'periodo' => 'required'
        ]);

        CronogramaTesis::create([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'periodo' => $request->periodo
        ]);

        return redirect()->route('admin.secretaria.cronoTesis.index')->with('info', 'Cronograma creado con éxito!');
    }
}
