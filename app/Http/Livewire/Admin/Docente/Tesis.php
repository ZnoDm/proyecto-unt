<?php

namespace App\Http\Livewire\Admin\Docente;

use App\Mail\TesisJuradoAcepta;
use App\Models\Docente;
use App\Models\Jurado;
use App\Models\Tesis as ModelsTesis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Tesis extends Component
{
    public $tesis,$docente;
    protected $listeners = ['aceptar'];
    public function mount(){
        
        $this->docente = Docente::firstWhere(['docente_email'=>auth()->user()->email]);
        $this->tesis = DB::table('tesis')
        ->join('jurados', 'tesis.id', '=', 'jurados.tesis_id')
        ->join('alumnos', 'tesis.alumno_id', '=', 'alumnos.id')
        ->select('tesis.*','jurados.id AS jurado_id','jurados.puesto','jurados.status AS estado_jurado','alumnos.alumno_apellido', 'alumnos.alumno_nombre')
        ->where('jurados.docente_id',$this->docente->id)
        ->get();
    }
    public function aceptar($jurado){
        Jurado::where('id',$jurado)->update(['status'=>2]);
        $jurado = Jurado::find($jurado);
        $tesis = ModelsTesis::find($jurado->tesis_id);
        $mail = new TesisJuradoAcepta($jurado,$tesis);
        Mail::to($tesis->alumno->alumno_email)->queue($mail);
    }
    public function render()
    {
        $this->tesis = DB::table('tesis')
        ->join('jurados', 'tesis.id', '=', 'jurados.tesis_id')
        ->join('alumnos', 'tesis.alumno_id', '=', 'alumnos.id')
        ->select('tesis.*','jurados.id AS jurado_id','jurados.puesto','jurados.status AS estado_jurado','alumnos.alumno_apellido', 'alumnos.alumno_nombre')
        ->where('jurados.docente_id',$this->docente->id)
        ->get();
        return view('livewire.admin.docente.tesis');
    }
}
