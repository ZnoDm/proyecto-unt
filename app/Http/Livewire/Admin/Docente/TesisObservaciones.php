<?php

namespace App\Http\Livewire\Admin\Docente;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TesisObservaciones extends Component
{
    public $tesis,$docente,$name;
    public $observaciones= [];
    
    public function updatedName($value){        
        $this->observaciones = DB::select('SELECT * FROM jurado_observaciones T 
                                    WHERE T.docente_id ='.$this->docente->id);
    }

    public function DameObservaciones($tesis_id){
        $this->observaciones = DB::select('SELECT * FROM jurado_observaciones T 
                                    WHERE T.docente_id ='.$this->docente->id);
    }

    public function store($alumno_id){

        $this->validate([
            'name' =>'required',
        ]);

        DB::table('jurado_observaciones')->insert([
            'po_detalle'=>$this->name,
            'docente_id'=>$this->docente->id,
            'alumno_id'=>$alumno_id,
            'po_status'=>1
        ]);
        $this->reset('name');
        $this->observaciones = DB::select('SELECT * FROM jurado_observaciones T 
                                    WHERE T.docente_id ='.$this->docente->id);
    }

    public function render()
    {
        
        $this->tesis = DB::select('SELECT * FROM tesis T 
        INNER JOIN jurados J ON T.id = J.tesis_id 
        INNER JOIN alumnos A ON A.id = T.alumno_id
                                    WHERE J.docente_id ='.$this->docente->id);
        return view('livewire.admin.docente.tesis-observaciones');
    }
}
