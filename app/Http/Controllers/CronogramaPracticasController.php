<?php

namespace App\Http\Controllers;

use App\Models\CronogramaPracticas;
use Illuminate\Http\Request;

class CronogramaPracticasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $cronoPracticas = CronogramaPracticas::where('fecha_inicio', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('admin.cronogramas.practicas.index', compact('search', 'cronoPracticas'));
    }

    public function create()
    {
        return view('admin.cronogramas.practicas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'periodo' => 'required'
        ]);

        CronogramaPracticas::create([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'periodo' => $request->periodo
        ]);

        return redirect()->route('admin.secretaria.cronoTesis.index')->with('info', 'Cronograma creado con éxito!');
    }
}
