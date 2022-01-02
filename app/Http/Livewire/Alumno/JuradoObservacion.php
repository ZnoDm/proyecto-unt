<?php

namespace App\Http\Livewire\Alumno;

use App\Models\Jurado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JuradoObservacion extends Component
{
    public $jurado,$observaciones;
    protected $rules =[
        'jurado.mensaje_respuesta' =>'required',
        'jurado.file_tesis' =>'required',
    ];
    public function mount(Jurado $jurado){
        $this->observaciones =DB::table('jurado_observaciones')->where('jurado_id',$jurado->id)->get();
    }

    public function enviar(){
        $this->validate();
        DB::table('jurado_observaciones')->where('jurado_id',$this->jurado->id)->update(['respuesta' => 1]);;
    }

    public function render()
    {
        return view('livewire.alumno.jurado-observacion');
    }
}
