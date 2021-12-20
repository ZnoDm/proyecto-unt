<?php

namespace App\Http\Controllers\Admin\Docente;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    public function index()
    {
        $docente = Docente::firstWhere(['docente_email'=>auth()->user()->email]);
        $tesis_asignadas = DB::select('SELECT * FROM tesis T 
                                        INNER JOIN jurados J ON T.id = J.tesis_id 
                                        INNER JOIN alumnos A ON A.id = T.alumno_id
                                        WHERE J.docente_id ='.$docente->id);
        return view('admin.docente.index',compact('tesis_asignadas','docente'));
    }
}
