<?php

namespace App\Http\Livewire\Admin\Almacen;

use App\Models\Docente;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDocente extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $sort = 'id';
    public $direction = 'asc';

    public function render()
    {
        $docentes = Docente::where('docente_nombre', 'LIKE', '%' . $this->search . '%')
                            ->orderBy($this->sort, $this->direction)->paginate(8);
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
