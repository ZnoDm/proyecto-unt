<?php

namespace App\Http\Livewire\Admin\Secretaria;

use App\Models\Practica;
use Livewire\Component;
use Livewire\WithPagination;

class BandejaPractica extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $practicas;
    public $pordocente='', $poralumno='', $porfecha=1, $pordetalle=1;

    //ESTADOS DE LA PRACTICA 1=EN REVISION, 2=APROBADA, 3= RECHAZADA, 4=FINALIZADA, 5=INFORME FINAL.,6 =INFORME DENEGADO
    public function mount()
    {
        
        

        $pordetalle = $request->get('pordetalle');
        if ($pordetalle == 2) {
            $practicasQuery = $practicasQuery->where('practica_status', 1);
        } elseif ($pordetalle == 3) {
            $practicasQuery = $practicasQuery->where('practica_status', 4);
        } else {
            $practicasQuery = $practicasQuery->where('practica_status', 1)->orWhere('practica_status', 4);
        }


        $orden = $request->get('orden');
        $filtro = $request->get('filtro');
        if ($filtro == '') {
            $filtro = 'created_at';
            $orden = 'asc';
        }

        $practicas = $practicasQuery->orderBy($filtro, $orden)->paginate(5); 
    }

    public function updatedAlumnoSearch($value)
    {
        $this->practicas = Practica::with('alumno')
        ->whereHas('alumno', function ($query) use ($value) {
            $query->where('alumno_nombre', 'like', '%' . $value . '%')
                ->orWhere('alumno_apellido', 'like', '%' . $value . '%');
        })->with('docente')
        ->whereHas('docente', function ($query) {
            $query->where('docente_nombre', 'like', '%' . $this->pordocente . '%')
                ->orWhere('docente_apellido', 'like', '%' . $this->pordocente . '%');
        })->get();
    }

    public function updatedDocenteSearch($value)
    {
        $this->practicas = Practica::with('alumno')
        ->whereHas('alumno', function ($query) {
            $query->where('alumno_nombre', 'like', '%' . $this->poralumno . '%')
                ->orWhere('alumno_apellido', 'like', '%' . $this->poralumno . '%');
        })->with('docente')
        ->whereHas('docente', function ($query) use ($value) {
            $query->where('docente_nombre', 'like', '%' . $value . '%')
                ->orWhere('docente_apellido', 'like', '%' . $value . '%');
        })->get();
    }

    public function updatedFechaSelected($value)
    {
        if ($value == 2) {
            $this->practicas = $this->practicas->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime('-7 day', strtotime(date('Y-m-d H:i:s')))));
        } elseif ($value == 3) {
            $this->practicas = $this->practicas->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime('-30 day', strtotime(date('Y-m-d H:i:s')))));
        } elseif ($value == 4) {
            $this->practicas = $this->practicas->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime('-90 day', strtotime(date('Y-m-d H:i:s')))));
        } elseif ($value == 5) {
            $this->practicas = $this->practicas->whereDate('created_at', '<=', date('Y-m-d H:i:s', strtotime('-365 day', strtotime(date('Y-m-d H:i:s')))));
        } else {
            /*No haces nada */
        }
    }

    public function render()
    {
        return view('livewire.admin.secretaria.bandeja-practica');
    }
}
