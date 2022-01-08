<?php

namespace App\Http\Livewire\Admin\Docente;

use App\Mail\TesisJuradoObservaAlumno;
use App\Models\Alumno;
use App\Models\Jurado;
use App\Models\Tesis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

        $jurado = Jurado::find($this->jurado);
        $tesis = Tesis::find($jurado->tesis_id);
        $mail = new TesisJuradoObservaAlumno($jurado,$tesis,$this->mensaje);
        Mail::to($tesis->alumno->alumno_email)->queue($mail);
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
