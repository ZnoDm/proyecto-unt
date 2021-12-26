<?php

namespace App\Http\Livewire\Admin\Secretaria;

use App\Models\Tesis;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TesisInformeFinal extends Component
{
    protected $listeners = ['enviar','denegar'];
    public $tesis,$alumno,$observacion;

    public function enviar($tesisId){
        $tesis = Tesis::find($tesisId);
        $tesis->update(['tesis_status' => 5]);
        session()->flash('info','Se mandó al Director de Escuela correctamente');
        return redirect()->route('admin.secretaria.tesis');
    }
    public function denegar($practicaId,$mensaje){
        $practica = Tesis::find($practicaId);
        $practica->update(['tesis_status' => 10]);
        DB::table('tesis_observaciones')->insert([
            'to_detalle'=>$mensaje,
            'to_status'=>'SECRETARIA A ALUMNO IF',
            'tesis_id'=>$practica->id,
            'administrativo_id'=>1,
        ]);
        session()->flash('info','Se ha denegado correctamente, se mandaron las observaciones al alumno');
        return redirect()->route('admin.secretaria.tesis');
    }
    

    public function render()
    {
        return view('livewire.admin.secretaria.tesis-informe-final');
    }
}
