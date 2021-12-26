<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Alumno\PracticaController;
use App\Http\Controllers\Alumno\TesisController;

/* Practicas */
Route::resource('practica', PracticaController::class)->names('tramite.practica');
Route::get('practica/{practica}/progreso', [PracticaController::class,'progreso'])->middleware('can:Tramite Practica')->name('tramite.practica.progreso');

Route::get('practica/{practica}/informefinal-create', [PracticaController::class,'informefinalcreate'])->middleware('can:Tramite Practica')->name('tramite.practica.informefinal.create');
Route::post('practica/{practica}/informefinal.store', [PracticaController::class,'informefinalstore'])->middleware('can:Tramite Practica')->name('tramite.practica.informefinal.store');
Route::get('practica/{practica}/informefinal-edit', [PracticaController::class,'informefinaledit'])->middleware('can:Tramite Practica')->name('tramite.practica.informefinal.edit');
Route::put('practica/{practica}/informefinal-update', [PracticaController::class,'informefinalupdate'])->middleware('can:Tramite Practica')->name('tramite.practica.informefinal.update');

/*tesis*/
Route::resource('tesis', TesisController::class)->names('tramite.tesis');
Route::get('tesis/{tesi}/progreso', [TesisController::class,'progreso'])->middleware('can:Tramite Tesis')->name('tramite.tesis.progreso');

Route::get('tesis/{tesi}/informefinal-create', [TesisController::class,'informefinalcreate'])->middleware('can:Tramite Tesis')->name('tramite.tesis.informefinal.create');
Route::post('tesis/{tesi}/informefinal.store', [TesisController::class,'informefinalstore'])->middleware('can:Tramite Tesis')->name('tramite.tesis.informefinal.store');

Route::get('tesis/{tesi}/informefinal-edit', [TesisController::class,'informefinaledit'])->middleware('can:Tramite Tesis')->name('tramite.tesis.informefinal.edit');
Route::put('tesis/{tesi}/informefinal-update', [TesisController::class,'informefinalupdate'])->middleware('can:Tramite Tesis')->name('tramite.tesis.informefinal.update');

