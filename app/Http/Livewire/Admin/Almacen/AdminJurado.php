<?php

namespace App\Http\Livewire\Admin\Almacen;

use App\Mail\JuradoTesis;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminJurado extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $filtro = 'd.docente_nombre';
    public $sort = 'jurado';
    public $direction = 'asc';
    
    public function render()
    {
        $jurados = DB::table('jurados as j')
                    ->select('d.docente_nombre as jurado', 'a.alumno_apellido', 'a.alumno_nombre',
		            't.tesis_titulo', 'dt.docente_nombre', 't.tesis_fechainicio',
                    't.tesis_fechafin')
                    ->join('docentes as d', 'j.docente_id', '=', 'd.id')
                    ->join('tesis as t', 'j.tesis_id', '=', 't.id')
                    ->join('docentes as dt', 't.docente_id', '=', 'dt.id')
                    ->join('alumnos as a', 't.alumno_id', '=', 'a.id')
                    ->where($this->filtro, 'like', '%'.$this->search.'%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate(8);

        return view('livewire.admin.almacen.admin-jurado', compact('jurados'));
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
