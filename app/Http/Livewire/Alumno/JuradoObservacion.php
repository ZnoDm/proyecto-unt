<?php

namespace App\Http\Livewire\Alumno;

use App\Models\Jurado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
class JuradoObservacion extends Component
{
    use WithFileUploads;
    public $jurado,$observaciones,$mensaje_respuesta,$file_tesis,$id_observacion;
    protected $rules =[
        'mensaje_respuesta' =>'required',
    ];
    

    public function save($respuestaa){

        $this->validate();
        $url='';
        if($this->file_tesis){            
            $file = $this->file_tesis->store('tesis/revisiones');
            $url =Storage::url($file);
        }
        DB::table('jurado_observaciones')->where('id',$respuestaa)->update([
            'respuesta' => $this->mensaje_respuesta,
            'file_respuesta' => $url,
            'jo_status'=>2
        ]);
        session()->flash('info','Se envio su respuesta');
        return redirect()->route('tramite.tesis.index');
    }

    public function mount(Jurado $jurado){
        $this->observaciones =DB::table('jurado_observaciones')->where('jurado_id',$jurado->id)->get();
    }
    
    public function render()
    {
        $this->observaciones =DB::table('jurado_observaciones')->where('jurado_id',$this->jurado->id)->get();
        return view('livewire.alumno.jurado-observacion');
    }
}
