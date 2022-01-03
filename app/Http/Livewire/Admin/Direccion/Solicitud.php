<?php

namespace App\Http\Livewire\Admin\Direccion;

use App\Models\Docente;
use App\Models\Practica;
use App\Models\Tesis;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Solicitud extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;
    public $docentes,$prueba,$practicas,$tesis;
    public $docente_search='',$alumno_search='',$detalle_selected=1,$tipo_selected=0,$fecha_selected=1;
    protected $listeners = ['aprobarTesis','denegarTesis','aprobarPractica','denegarPractica'];

    public function mount()
    {
        $this->docentes = Docente::where('docente_status','3')->orWhere('docente_status','2')->get();
        $this->practicas= Practica::where('practica_status',2)->orWhere('practica_status',5)->get();
        $this->tesis= Tesis::where('tesis_status',2)->orWhere('tesis_status',5)->get();
    }
    public function updatedAlumnoSearch($value){
        $this->practicas= Practica::with('alumno')
        ->whereHas('alumno', function  ($query) use ($value){
            $query->where('alumno_nombre','like','%'.$value.'%')
            ->orWhere('alumno_apellido','like','%'.$value.'%');
        })
        ->with('docente')
        ->whereHas('docente', function  ($query) {
            $query->where('docente_nombre','like','%'.$this->docente_search.'%')
            ->orWhere('docente_apellido','like','%'.$this->docente_search.'%');
        })->get();


        $this->tesis= Tesis::with('alumno')
        ->whereHas('alumno', function  ($query) use ($value){
            $query->where('alumno_nombre','like','%'.$value.'%')
            ->orWhere('alumno_apellido','like','%'.$value.'%');
        })
        ->with('docente')
        ->whereHas('docente', function  ($query) {
            $query->where('docente_nombre','like','%'.$this->docente_search.'%')
            ->orWhere('docente_apellido','like','%'.$this->docente_search.'%');
        })->get();
    }
    public function updatedDocenteSearch($value){
        $this->practicas= Practica::with('alumno')
        ->whereHas('alumno', function  ($query) {
            $query->where('alumno_nombre','like','%'.$this->alumno_search.'%')
            ->orWhere('alumno_apellido','like','%'.$this->alumno_search.'%');
        })
        ->with('docente')
        ->whereHas('docente', function  ($query) use($value){
            $query->where('docente_nombre','like','%'.$value.'%')
            ->orWhere('docente_apellido','like','%'.$value.'%');
        })->get();


        $this->tesis= Tesis::with('alumno')
        ->whereHas('alumno', function  ($query) {
            $query->where('alumno_nombre','like','%'.$this->alumno_search.'%')
            ->orWhere('alumno_apellido','like','%'.$this->alumno_search.'%');
        })
        ->with('docente')
        ->whereHas('docente', function  ($query) use($value){
            $query->where('docente_nombre','like','%'.$value.'%')
            ->orWhere('docente_apellido','like','%'.$value.'%');
        })->get();
    }
    public function updatedDetalleSelected($value)
    {
        if ($value==2) {
            $this->practicas = Practica::where('practica_status',2)->get();
            $this->tesis= Tesis::where('tesis_status',2)->get();
        } elseif ($this->detalle_selected==3) {
            $this->practicas = Practica::where('practica_status',5)->get();
            $this->tesis= Tesis::where('tesis_status',5)->get();
        }else {
            $this->practicas = Practica::where('practica_status',5)->get();
            $this->tesis= Tesis::where('tesis_status',5)->get();
        }
    }
    public function updatedFechaSelected($value)
    {
        if ($value==2) {
            $this->practicas = Practica::whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))))->get();
            $this->tesis= Tesis::whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))))->get();
        } elseif ($value==3) {
            $this->practicas = Practica::whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-30 day', strtotime(date('Y-m-d H:i:s')))))->get();
            $this->tesis= Tesis::whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))))->get();
        }elseif ($value==4) {
            $this->practicas = Practica::whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-90 day', strtotime(date('Y-m-d H:i:s')))))->get();
            $this->tesis= Tesis::whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))))->get();
        }elseif ($value==5) {
            $this->practicas = Practica::whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-365 day', strtotime(date('Y-m-d H:i:s')))))->get();
            $this->tesis= Tesis::whereDate('created_at','<=',date('Y-m-d H:i:s',strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))))->get();
        } else {
            $this->practicas = Practica::whereDate('created_at','<=',date('Y-m-d H:i:s'))->get();
            $this->tesis= Tesis::whereDate('created_at','<=',date('Y-m-d H:i:s'))->get();
        }
    }
    public function aprobarPractica($practicaId,$estatus){
        //Informe final o Solicitud
        $practica = Practica::find($practicaId);
        if($estatus ==5)
            $practica->update(['practica_status' => 6]);
        else
            $practica->update(['practica_status' => 3]);
        session()->flash('info','Practica Aprobada correctamente');
        return redirect()->route('admin.direccion.index');
    }
    
    public function denegarPractica($practicaId,$mensaje,$estatus){
        //Informe final o Solicitud
        $practica = Practica::find($practicaId);
        if($estatus ==5){
            $practica->update(['practica_status' => 11]);
            DB::table('practica_obervaciones')->insert([
            'po_detalle'=>$mensaje,
            'po_status'=>'DIRECTOR A ALUMNO',
            'practica_id'=>$practica->id,
            'administrativo_id'=>2,
        ]);
        }
        else{            
            $practica->update(['practica_status' => 9]);
            DB::table('practica_obervaciones')->insert([
            'po_detalle'=>$mensaje,
            'po_status'=>'DIRECTOR A ALUMNO',
            'practica_id'=>$practica->id,
            'administrativo_id'=>2,]);
        }

        
        session()->flash('info','Se ha denegado la practica correctamente, se mandaron las observaciones al alumno');
        return redirect()->route('admin.direccion.index');
    }
    

    public function aprobarTesis($tesisId,$estatus,$temporal){
        //Solicitud
        if($estatus==2){        
            $tesis = Tesis::find($tesisId);
            $tesis->update(['tesis_status' => 3]);
            session()->flash('info','Tesis Aprobado correctamente');
        }else{        
        //Informe final
        if(empty($temporal[2]))                
            session()->flash('info','Error debe agregar 3 jurados');
        else{
                $tesis = Tesis::find($tesisId);
                $tesis->update(['tesis_status' => 6]);
                DB::table('jurados')->insert([
                    'tesis_id'=>$tesis->id,
                    'docente_id'=>$temporal[0],
                    'puesto'=> ''
                ]);
                DB::table('jurados')->insert([
                    'tesis_id'=>$tesis->id,
                    'docente_id'=>$temporal[1]
                ]);
                DB::table('jurados')->insert([
                    'tesis_id'=>$tesis->id,
                    'docente_id'=>$temporal[2]
                ]);
                session()->flash('info','Tesis IF Aprobado correctamente');
        }
        }
        
        return redirect()->route('admin.direccion.index');
    }   
    public function denegarTesis($tesisId,$mensaje,$estatus){
        //Informe final o Solicitud
        $tesis = Tesis::find($tesisId);
        if($estatus ==5){
            $tesis->update(['tesis_status' => 11]);
            DB::table('tesis_observaciones')->insert([
            'to_detalle'=>$mensaje,
            'to_status'=>'DIRECTOR A ALUMNO',
            'tesis_id'=>$tesis->id,
            'administrativo_id'=>2,
        ]);
        }
        else{            
            $tesis->update(['tesis_status' => 9]);
            DB::table('tesis_observaciones')->insert([
            'to_detalle'=>$mensaje,
            'to_status'=>'DIRECTOR A ALUMNO',
            'tesis_id'=>$tesis->id,
            'administrativo_id'=>2,]);
        }

        
        session()->flash('info','Se ha denegado la tesis correctamente, se mandaron las observaciones al alumno');
        return redirect()->route('admin.direccion.index');
    } 

    public function render()
    {
        return view('livewire.admin.direccion.solicitud');
    }
}
