<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//rutas para usuarios
     Route::get('/usuarios/listar', [App\Http\Controllers\HomeController::class, 'listaUsuarios']);
     Route::get('/usuarios/listaelimina', [App\Http\Controllers\HomeController::class, 'listaelimina']);
     Route::get('/usuarios/create', [App\Http\Controllers\HomeController::class, 'crearUsuario']);
     Route::post('/usuarios/registrar', [App\Http\Controllers\HomeController::class, 'store']);
     Route::get('/usuarios/actualizar/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
     Route::put('/usuarios/actualizar/{id}', [App\Http\Controllers\HomeController::class, 'update']);
     Route::get('/usuarios/elimina/{id}', [App\Http\Controllers\HomeController::class, 'elimina']);
