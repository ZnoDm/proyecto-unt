<?php

namespace App\Http\Livewire\Admin\Docente;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TesisObservacion extends Component
{
    public $jurado,$observaciones,$mensaje;
    protected $rules =[
        'mensaje' =>'required',
    ];
    public function enviar(){
        $this->validate();
        DB::table('jurado_observaciones')->insert([
            'observacion'=>$this->mensaje,
            'jurado_id'=>$this->jurado,
            'jo_status'=>1,
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
        ]);
        $this->mensaje='';
    }
    public function mount(){
        $this->observaciones =DB::table('jurado_observaciones')->where('jurado_id',$this->jurado)->get();
    }    
    public function render()
    {
        
        $this->observaciones =DB::table('jurado_observaciones')->where('jurado_id',$this->jurado)->get();
        return view('livewire.admin.docente.tesis-observacion');
    }
}
