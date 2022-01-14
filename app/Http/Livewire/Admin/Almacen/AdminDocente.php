<?php

namespace App\Http\Livewire\Admin\Almacen;

use App\Models\Docente;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDocente extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $sort = 'id';
    public $direction = 'asc';

    public function assignAsesor($id,$value){
        $docente =Docente::find($id);
        if($value == '1'){
            if($docente->docente_status==1 or $docente->docente_status==3){                
                $docente->update(['docente_status'=>2]);
                session()->flash('info','Se ha removido como asesor de PRACTICAS');
            }else{
                if($docente->docente_status==2){
                    $docente->update(['docente_status'=>3]);
                    session()->flash('info','Se asignado como asesor TESIS Y PRACTICAS');
                }else{
                    $docente->update(['docente_status'=>1]);
                    session()->flash('info','Se asignado como asesor PRACTICAS');
                }
            }
            
        }else{
            if($docente->docente_status==2 or $docente->docente_status==3){                
                $docente->update(['docente_status'=>1]);
                session()->flash('info','Se ha removido como asesor de TESIS');
            }else{
                if($docente->docente_status==1){
                    $docente->update(['docente_status'=>3]);
                    session()->flash('info','Se asignado como asesor TESIS Y PRACTICAS');
                }else{
                    $docente->update(['docente_status'=>2]);
                    session()->flash('info','Se asignado como asesor TESIS');
                }
            }
        }
    }

    public function render()
    {
        $docentes = Docente::where('docente_nombre', 'LIKE', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)->paginate(5);
        return view('livewire.admin.almacen.admin-docente', compact('docentes'));
    }
    
    public function limpiar_page()
    {
        $this->reset('page');
    }

    public function order($sort)
    {
        if ($this->sort == $sort) 
        {
            if ($this->direction == 'desc') 
            {
                $this->direction = 'asc';
            }
            else 
            {
                $this->direction = 'desc';
            }
        } 
        else
        {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
