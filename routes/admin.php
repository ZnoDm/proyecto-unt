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
Route::get('/secretaria/practica/{id}/revision', [PracticaController::class,'revision'])->middleware('can:Ver Administrador Dashboard')->name('admin.secretaria.practica.revision');
Route::get('/secretaria/tesis', [TesisController::class,'index'])->middleware('can:Ver Administrador Dashboard')->name('admin.secretaria.tesis');
Route::get('/secretaria/tesis/{id}/revision', [TesisController::class,'revision'])->middleware('can:Ver Administrador Dashboard')->name('admin.secretaria.tesis.revision');

/* Direccion */
Route::get('/direccion', [DireccionSolicitud::class,'index'])->name('admin.direccion.index');

/* Docente Jurado */
Route::get('/docente', [DocenteJurado::class,'index'])->name('admin.docente.index');


/* 
Route::get('/alumnos', [AdminController::class,'alumnos'])->name('admin.alumnos');
Route::resource('/roles', RoleController::class)->names('admin.roles');
Route::get('/docente/{docente}', [DocenteController::class,'show'])->name('admin.docente.show');
Route::get('/docente/asignar/{docente}', [DocenteController::class,'asignar'])->name('admin.docente.asignar');
Route::post('/docente/asignado', [DocenteController::class,'asignado'])->name('admin.docente.asignado');
Route::get('/empresas', [AdminController::class,'empresa'])->name('admin.empresa');
Route::get('/vouchers', [AdminController::class,'voucher'])->name('admin.voucher');
Route::get('/estadistica/grafico1', [AdminController::class,'grafico1'])->name('grafico1');





Route::post('/practica/aprobar/{id}/{alumno}/{estado}', [PracticaController::class,'aprobar'])->name('admin.practica.aprobar');
Route::post('/practica/denegar/{id}/{alumno}/{estado}', [PracticaController::class,'denegar'])->name('admin.practica.denegar');
Route::get('/f_practicas', [PracticaController::class,'practicas_finalizadas'])->name('admin.finalizadaspracicas');
Route::get('/practica/show/{id}', [PracticaController::class,'show'])->name('admin.practica.show');
Route::post('/tesis/aprobar/{id}/{alumno}/{estado}', [TesisController::class,'aprobar'])->name('admin.tesis.aprobar');
Route::post('/tesis/denegar/{id}/{alumno}/{estado}', [TesisController::class,'denegar'])->name('admin.tesis.denegar');
Route::get('/f_tesis', [TesisController::class,'sustenacion'])->name('admin.tesisfinalizadas');
Route::get('/f_calificar/{id}', [TesisController::class,'calificar'])->name('admin.tesis.calificar');
Route::post('/calificando', [TesisController::class,'calificando'])->name('admin.tesis.calificando');
Route::get('/f_asignar_fecha/{id}', [TesisController::class,'asignar_fecha'])->name('admin.tesis.asignar_fecha');
Route::post('/asignando_fecha', [TesisController::class,'asignando_fecha'])->name('admin.tesis.asignando_fecha');
Route::get('/finalizadas', [TesisController::class,'tesis'])->name('admin.tesis.tesfinales');
Route::get('/finalizadas/show/{id}', [TesisController::class,'show'])->name('admin.tesis.show'); */