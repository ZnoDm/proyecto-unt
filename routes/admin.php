<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Direccion\Solicitud as DireccionSolicitud;
use App\Http\Controllers\Admin\Docente\DocenteController as DocenteJurado;

use App\Http\Controllers\Admin\Secretaria\PracticaController;
use App\Http\Controllers\Admin\Secretaria\TesisController;
use App\Http\Livewire\Admin\Almacen\AlmacenDocente;
use App\Models\Docente;

Route::get('/', function () {
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

/* Almacen de datos */
Route::get('/alumnos', [AdminController::class,'alumnos'])->name('admin.alumnos'); //Alumnos
Route::get('/docentes', [AdminController::class, 'docentes'])->name('admin.docentes'); //Docentes
Route::get('/jurados', [AdminController::class, 'jurados'])->name('admin.jurados'); //Jurados
Route::get('/empresas', [AdminController::class, 'empresas'])->name('admin.empresas'); //Empresas
Route::get('/vouchers', [AdminController::class, 'vouchers'])->name('admin.vouchers'); //Vouchers

<<<<<<< HEAD
/* 
Route::resource('/roles', RoleController::class)->names('admin.roles');
Route::get('/docente/{docente}', [DocenteController::class,'show'])->name('admin.docente.show');
Route::get('/docente/asignar/{docente}', [DocenteController::class,'asignar'])->name('admin.docente.asignar');
Route::post('/docente/asignado', [DocenteController::class,'asignado'])->name('admin.docente.asignado');
Route::get('/empresas', [AdminController::class,'empresa'])->name('admin.empresa');
Route::get('/vouchers', [AdminController::class,'voucher'])->name('admin.voucher');
Route::get('/estadistica/grafico1', [AdminController::class,'grafico1'])->name('grafico1');
=======
>>>>>>> 5c1b65e18b84cb96451e23a5cbec975fb7a31598

