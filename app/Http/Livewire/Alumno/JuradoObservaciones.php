<?php

namespace App\Http\Livewire\Alumno;

use App\Models\Jurado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JuradoObservaciones extends Component
{
    public $tesis,$jurados,$observaciones=[];
    public $open1 = false,$open2=false,$open3=false;
    public function mount(){
        $this->jurados = Jurado::with('docente')->where('tesis_id',$this->tesis->id)->get();        
        $this->observaciones =DB::table('jurado_observaciones')->get();
    }

    public function cargarObservaciones($jurado){        
        $this->observaciones =DB::table('jurado_observaciones')->where('jurado_id',$jurado)->get();
        $this->open1 = true;
    }
    public function render()
    {
        return view('livewire.alumno.jurado-observaciones');
    }
}
