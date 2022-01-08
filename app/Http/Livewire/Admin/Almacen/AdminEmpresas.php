<?php

namespace App\Http\Livewire\Admin\Almacen;

use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithPagination;

class AdminEmpresas extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $sort = 'id';
    public $direction = 'asc';

    public function render()
    {
        $empresas = Empresa::where('empresa_razonsocial', 'like', '%'.$this->search.'%')
                        ->orwhere('empresa_representante', 'like', '%'.$this->search.'%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate(5);

        return view('livewire.admin.almacen.admin-empresas', compact('empresas'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
