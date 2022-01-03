<?php

namespace App\Http\Livewire\Alumno;

use App\Models\Jurado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Jurados extends Component
{
    public $tesis,$jurados;

    public function mount(){
        $this->jurados = Jurado::with('docente')->where('tesis_id',$this->tesis->id)->get();
    }
    public function render()
    {
        return view('livewire.alumno.jurados');
    }
}
