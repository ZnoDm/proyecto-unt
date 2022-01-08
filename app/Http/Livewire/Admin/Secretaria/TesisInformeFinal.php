<?php

namespace App\Http\Livewire\Admin\Secretaria;

use App\Mail\TesisSecretariaDeniega;
use App\Models\Alumno;
use App\Models\Tesis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
    public function denegar($tesisId,$mensaje){
        $tesis = Tesis::find($tesisId);
        $tesis->update(['tesis_status' => 10]);
        DB::table('tesis_observaciones')->insert([
            'to_detalle'=>$mensaje,
            'to_status'=>'SECRETARIA A ALUMNO IF',
            'tesis_id'=>$tesis->id,
            'administrativo_id'=>1,
        ]);
        $tipo="Informe Final";
        $alumno = Alumno::firstWhere('id',$tesis->alumno_id);
        $mail = new TesisSecretariaDeniega($alumno,$tesis,$mensaje,$tipo);
        Mail::to($alumno->alumno_email)->queue($mail);

        session()->flash('info','Se ha denegado correctamente, se mandaron las observaciones al alumno');
        return redirect()->route('admin.secretaria.tesis');
    }
    

    public function render()
    {
        return view('livewire.admin.secretaria.tesis-informe-final');
    }
}
