<?php

namespace App\Http\Livewire\Admin\Secretaria;

use App\Models\Tesis;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TesisSolicitud extends Component
{
    protected $listeners = ['enviar','denegar'];
    public $tesis,$alumno,$observacion;

    public function enviar($tesisId){
        $tesis = Tesis::find($tesisId);
        $tesis->update(['tesis_status' => 2]);
        session()->flash('info','Se mandó al Director de Escuela correctamente');
        return redirect()->route('admin.secretaria.tesis');
    }
    public function denegar($tesisId,$mensaje){
        $tesis = Tesis::find($tesisId);
        $tesis->update(['tesis_status' => 8]);
        DB::table('tesis_observaciones')->insert([
            'to_detalle'=>$mensaje,
            'to_status'=>'SECRETARIA A ALUMNO',
            'tesis_id'=>$tesis->id,
            'administrativo_id'=>1,
        ]);
        session()->flash('info','Se ha denegado Correctamente, se mandaron las observaciones al alumno');
        return redirect()->route('admin.secretaria.tesis');
    }
    
    

    public function render()
    {
        return view('livewire.admin.secretaria.tesis-solicitud');
    }
}
