<?php

use App\Http\Controllers\chamadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [chamadoController::class, 'index']);
Route::get('/show/{id}', [chamadoController::class, 'show']);
Route::get('/create', [chamadoController::class, 'create']);
Route::post('/store', [chamadoController::class, 'store']);
Route::patch('/update/{id}', [chamadoController::class, 'update']);
Route::delete('/destroy/{id}', [chamadoController::class, 'destroy']);
