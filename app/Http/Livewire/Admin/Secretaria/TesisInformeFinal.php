<?php

namespace App\Http\Livewire\Admin\Secretaria;

use App\Models\Tesis;
use Livewire\Component;

class TesisInformeFinal extends Component
{
    protected $listeners = ['enviar'];
    public $tesis,$alumno;

    public function enviar($tesisId){
        $tesis = Tesis::find($tesisId);
        $tesis->update(['tesis_status' => 5]);
        session()->flash('info','Se mandó al Director de Escuela correctamente');
        return redirect()->route('admin.secretaria.tesis');
    }
    

    public function render()
    {
        return view('livewire.admin.secretaria.tesis-informe-final');
    }
}
