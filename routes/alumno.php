<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Alumno\PracticaController;
use App\Http\Controllers\Alumno\TesisController;

/* Practicas */
Route::resource('practica', PracticaController::class)->names('tramite.practica');
Route::get('practica/{id}/progreso', [PracticaController::class,'progreso'])->middleware('can:Leer Practica')->name('tramite.practica.progreso');
Route::get('practica/{id}/progreso-edit', [PracticaController::class,'progresoedit'])->middleware('can:Leer Practica')->name('tramite.practica.progresoedit');
Route::post('practica/{id}/informefinal', [PracticaController::class,'informefinal'])->middleware('can:Leer Practica')->name('tramite.practica.informefinal');

/*tesis*/
Route::resource('tesis', TesisController::class)->names('tramite.tesis');
Route::get('tesis/{id}/progreso', [TesisController::class,'progreso'])->middleware('can:Leer Tesis')->name('tramite.tesis.progreso');
Route::post('tesis/{id}/informefinal', [TesisController::class,'informefinal'])->middleware('can:Leer Tesis')->name('tramite.tesis.informefinal');

