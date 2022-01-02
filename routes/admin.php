<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Direccion\Solicitud as DireccionSolicitud;
use App\Http\Controllers\Admin\Docente\DocenteController as DocenteJurado;

use App\Http\Controllers\Admin\Secretaria\PracticaController;
use App\Http\Controllers\Admin\Secretaria\TesisController;

Route::get('', function () {
     return view('admin.index');
})->middleware('can:Ver Administrador Dashboard')->name('admin.home');

/* Secretaria */
Route::get('/secretaria/practicas', [PracticaController::class,'index'])->middleware('can:Ver Administrador Dashboard')->name('admin.secretaria.practicas');
Route::get('/secretaria/practica/{id}/review', [PracticaController::class,'revision'])->middleware('can:Ver Administrador Dashboard')->name('admin.secretaria.practica.revision');
Route::get('/secretaria/tesis', [TesisController::class,'index'])->middleware('can:Ver Administrador Dashboard')->name('admin.secretaria.tesis');
Route::get('/secretaria/tesis/{id}/review', [TesisController::class,'revision'])->middleware('can:Ver Administrador Dashboard')->name('admin.secretaria.tesis.revision');

/* Direccion */
Route::get('/direccion', [DireccionSolicitud::class,'index'])->name('admin.direccion.index');

/* Docente Jurado */
Route::get('/docente', [DocenteJurado::class,'index'])->name('admin.docente.index');



