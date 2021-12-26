<?php

namespace App\Http\Livewire\Admin\Almacen;

use App\Models\Alumno;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAlumno extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $sort = 'id';
    public $direction = 'asc';

    public function render()
    {
        $alumnos = Alumno::where('alumno_nombre', 'LIKE', '%' . $this->search . '%')->orWhere('alumno_email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('alumno_apellido', 'LIKE', '%' . $this->search . '%')->orderBy($this->sort, $this->direction)
            ->paginate(8);
        return view('livewire.admin.almacen.admin-alumno', compact('alumnos'));
    }
    
    public function limpiar_page()
    {
        $this->reset('page');
    }

    public function order($sort)
    {
        if ($this->sotr == $sort) 
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
