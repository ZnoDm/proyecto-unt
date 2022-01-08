<?php

namespace App\Http\Livewire\Admin\Secretaria;

use App\Mail\PracticaSecretariaDeniega;
use App\Models\Alumno;
use App\Models\Practica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class PracticaSolicitud extends Component
{
    protected $listeners = ['enviar','denegar'];
    public $practica,$alumno,$observacion;
    
    public function enviar($practicaId){
        $practica = Practica::find($practicaId);
        $practica->update(['practica_status' => 2]);
        session()->flash('info','Se mandó al Director de Escuela correctamente');
        return redirect()->route('admin.secretaria.practicas');
    }

    public function denegar($practicaId,$mensaje){
        $practica = Practica::find($practicaId);
        $practica->update(['practica_status' => 8]);
        DB::table('practica_observaciones')->insert([
            'po_detalle'=>$mensaje,
            'po_status'=>'SECRETARIA A ALUMNO',
            'practica_id'=>$practica->id,
            'administrativo_id'=>1,
        ]);
        $tipo="Plan de Practica";
        $alumno = Alumno::firstWhere('id',$practica->alumno_id);
        $mail = new PracticaSecretariaDeniega($alumno,$practica,$mensaje,$tipo);
        Mail::to($alumno->alumno_email)->queue($mail);

        session()->flash('info','Se ha denegado Correctamente, se mandaron las observaciones al alumno');
        return redirect()->route('admin.secretaria.practicas');
    }
    
    public function render()
    {
        return view('livewire.admin.secretaria.practica-solicitud');
    }
}
