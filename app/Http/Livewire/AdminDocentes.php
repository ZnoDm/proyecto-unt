<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Docente;
use Livewire\WithPagination;
class AdminDocentes extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function render()
    {
        $docentes = Docente::where('nombre','LIKE','%'.$this->search.'%')->paginate(6);
        return view('livewire.admin-docentes',compact('docentes'));
    }
    public function limpiar_page(){
        $this->reset('page');
    }
}
