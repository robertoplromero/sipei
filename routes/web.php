<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Usuarios ->middleware(['auth', 'verified']);
Route::resource('usuarios', \App\Http\Controllers\SIPEI\UserController::class)->middleware(['auth', 'verified']);
Route::post('usuarios/{usuario}/restore', array(\App\Http\Controllers\SIPEI\UserController::class, 'restore'))->middleware(['auth', 'verified'])->name('usuarios.restore');

// Unidades
Route::resource('unidades', \App\Http\Controllers\SIPEI\UnidadController::class)->middleware(['auth', 'verified']);
Route::post('unidades/{unidade}/restore', array(\App\Http\Controllers\SIPEI\UnidadController::class, 'restore'))->middleware(['auth', 'verified'])->name('unidades.restore');

// Bitácora
Route::get('bitacora', array(\App\Http\Controllers\SIPEI\BitacoraController::class, 'index'))->middleware(['auth', 'verified'])->name('bitacora.index');

// Unidades
Route::resource('historicos', \App\Http\Controllers\SIPEI\HistoricoController::class)->middleware(['auth', 'verified']);
Route::post('historicos/{historico}/restore', array(\App\Http\Controllers\SIPEI\HistoricoController::class, 'restore'))->middleware(['auth', 'verified'])->name('historicos.restore');