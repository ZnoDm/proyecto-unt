<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumno;
use Livewire\WithPagination;

class AdminAlumnos extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function render()
    {
        $alumnos = Alumno::where('nombre','LIKE','%'.$this->search.'%')->orWhere('email','LIKE','%'.$this->search.'%')->paginate(8);
        return view('livewire.admin-alumnos',compact('alumnos'));
    }
    public function limpiar_page(){
        $this->reset('page');
    }
}
