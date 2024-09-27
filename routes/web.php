<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComunaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comunas', [ComunaController::class, 'index']);