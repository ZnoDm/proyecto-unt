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
Route::get('/secretaria/practicas', [PracticaController::class,'index'])->middleware('can:Ver Secretaria Practicas')->name('admin.secretaria.practicas');
Route::get('/secretaria/practica/{id}/review', [PracticaController::class,'revision'])->middleware('can:Ver Secretaria Practicas')->name('admin.secretaria.practica.revision');
Route::get('/secretaria/tesis', [TesisController::class,'index'])->middleware('can:Ver Secretaria Tesis')->name('admin.secretaria.tesis');
Route::get('/secretaria/tesis/{id}/review', [TesisController::class,'revision'])->middleware('can:Ver Secretaria Tesis')->name('admin.secretaria.tesis.revision');

/* Direccion */
Route::get('/direccion', [DireccionSolicitud::class,'index'])->middleware('can:Ver Director Solicitudes')->name('admin.direccion.index');

/* Docente Jurado */
Route::get('/docente', [DocenteJurado::class,'index'])->middleware('can:Ver Docente Solicitudes')->name('admin.docente.index');

/* Almacen de datos */
Route::get('/alumnos', [AdminController::class,'alumnos'])->middleware('can:Ver Administrador Dashboard')->name('admin.alumnos'); //Alumnos
Route::get('/docentes', [AdminController::class, 'docentes'])->middleware('can:Ver Administrador Dashboard')->name('admin.docentes'); //Docentes
Route::get('/jurados', [AdminController::class, 'jurados'])->middleware('can:Ver Administrador Dashboard')->name('admin.jurados'); //Jurados
Route::get('/empresas', [AdminController::class, 'empresas'])->middleware('can:Ver Administrador Dashboard')->name('admin.empresas'); //Empresas
Route::get('/vouchers', [AdminController::class, 'vouchers'])->middleware('can:Ver Administrador Dashboard')->name('admin.vouchers'); //Vouchers
