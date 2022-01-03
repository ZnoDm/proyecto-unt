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
        return view('admin.docente.index');
    }
}
