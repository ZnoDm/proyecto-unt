<?php

namespace App\Http\Livewire\Admin\Direccion;

use App\Models\Docente;
use App\Models\Practica;
use App\Models\Tesis;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Solicitud extends Component
{
    public $tipo='practica',$practicas,$tesis,$docentes;
    protected $listeners = ['aprobarTesis','aprobarTesisIF','aprobarPractica','denegarPractica'];


    public function mount()
    {
        $this->docentes = Docente::where('docente_status','3')->orWhere('docente_status','2')->get();
        $this->practicas = Practica::where('practica_status',2)->orWhere('practica_status',5)->get();
        $this->tesis = Tesis::where('tesis_status',2)->orWhere('tesis_status',5)->get();
    }
    public function aprobarTesis($tesisId,$estatus){
        $tesis = Tesis::find($tesisId);
        $tesis->update(['tesis_status' => 3]);
        session()->flash('info','Tesis Aprobado correctamente');
        return redirect()->route('admin.direccion.index');
    }
    public function aprobarTesisIF($tesisId,$estatus,$temporal){
        $tesis = Tesis::find($tesisId);
        $tesis->update(['tesis_status' => 6]);
        DB::table('jurados')->insert([
            'tesis_id'=>$tesis->id,
            'docente_id'=>$temporal[0]
        ]);
        DB::table('jurados')->insert([
            'tesis_id'=>$tesis->id,
            'docente_id'=>$temporal[1]
        ]);
        DB::table('jurados')->insert([
            'tesis_id'=>$tesis->id,
            'docente_id'=>$temporal[2]
        ]);
        session()->flash('info','Tesis Aprobado correctamente');
        return redirect()->route('admin.direccion.index');
    }
    public function aprobarPractica($practicaId,$estatus){
        $practica = Practica::find($practicaId);
        if($estatus ==5)
            $practica->update(['practica_status' => 6]);
        else
            $practica->update(['practica_status' => 3]);
        session()->flash('info','Practica Aprobada correctamente');
        return redirect()->route('admin.direccion.index');
    }

    public function denegarPractica($practicaId,$mensaje,$estatus){
        $practica = Practica::find($practicaId);
        if($estatus ==5){
            $practica->update(['practica_status' => 11]);
            DB::table('practica_obervaciones')->insert([
            'po_detalle'=>$mensaje,
            'po_status'=>'DIRECTOR A ALUMNO',
            'practica_id'=>$practica->id,
            'administrativo_id'=>2,
        ]);
        }
        else{            
            $practica->update(['practica_status' => 9]);
            DB::table('practica_obervaciones')->insert([
            'po_detalle'=>$mensaje,
            'po_status'=>'DIRECTOR A ALUMNO',
            'practica_id'=>$practica->id,
            'administrativo_id'=>2,]);
        }

        
        session()->flash('info','Se ha denegado correctamente, se mandaron las observaciones al alumno');
        return redirect()->route('admin.direccion.index');
    }

    
    
    public function render()
    {
        return view('livewire.admin.direccion.solicitud');
    }
}
