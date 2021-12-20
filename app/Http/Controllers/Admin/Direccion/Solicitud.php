<?php

namespace App\Http\Controllers\Admin\Direccion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Solicitud extends Controller
{
    public function index(){
        return view('admin.direccion.index');
    }
}
