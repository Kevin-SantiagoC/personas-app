<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\MunicipioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas.index');

Route::post('/comunas', [ComunaController::class, 'store'])->name('comunas.store');

Route::get('/comunas/create', [ComunaController::class, 'create'])->name('comunas.create');

Route::delete('/comunas/{comuna}', [ComunaController::class, 'destroy'])->name('comunas.destroy');

Route::put('/comunas/{comuna}', [ComunaController::class, 'update'])->name('comunas.update');

Route::get('/comunas/{comuna}/edit', [ComunaController::class, 'edit'])->name('comunas.edit');

//Municipios

Route::get('/municipios',[MunicipioController::class, 'index'])->name('municipios.index');
Route::post('/municipios',[MunicipioController::class, 'store'])->name('municipios.store');
Route::get('/comunas/create',[MunicipioController::class, 'create'])->name('municipios.create');