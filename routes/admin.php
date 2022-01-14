<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AlmacenController;
use App\Http\Controllers\Admin\Direccion\RolController;
use App\Http\Controllers\Admin\Direccion\Solicitud as DireccionSolicitud;
use App\Http\Controllers\Admin\Docente\DocenteController as DocenteJurado;
use App\Http\Controllers\Admin\EstadisticaController;
use App\Http\Controllers\Admin\Secretaria\PracticaController;
use App\Http\Controllers\Admin\Secretaria\TesisController;
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
Route::resource('roles', RolController::class)->middleware('can:Ver Director Solicitudes')->names('admin.direccion.roles');

/* Docente Jurado */
Route::get('/docente', [DocenteJurado::class,'index'])->middleware('can:Ver Docente Solicitudes')->name('admin.docente.index');

/* Almacen de datos */
Route::get('/alumnos', [AlmacenController::class,'alumnos'])->middleware('can:Ver Administrador Dashboard')->name('admin.alumnos'); //Alumnos
Route::get('/docentes', [AlmacenController::class, 'docentes'])->middleware('can:Ver Administrador Dashboard')->name('admin.docentes'); //Docentes
Route::get('/jurados', [AlmacenController::class, 'jurados'])->middleware('can:Ver Administrador Dashboard')->name('admin.jurados'); //Jurados
Route::get('/empresas', [AlmacenController::class, 'empresas'])->middleware('can:Ver Administrador Dashboard')->name('admin.empresas'); //Empresas
Route::get('/vouchers', [AlmacenController::class, 'vouchers'])->middleware('can:Ver Administrador Dashboard')->name('admin.vouchers'); //Vouchers

/* Estadistica */
Route::get('/estadistica/docente-asesor', [EstadisticaController::class, 'docenteAsesor'])->middleware('can:Ver Administrador Dashboard')->name('admin.estadistica.docenteAsesor');

Route::get('/prueba', function () {
     return view('pruebas');
})->middleware('can:Ver Administrador Dashboard')->name('admin.prueba');