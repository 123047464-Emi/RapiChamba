<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\CalleController;
use App\Http\Controllers\HabilidadController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('auth.login');
});


Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/registro', function () {
    return view('auth.registro'); // tu vista Blade con el formulario
});


Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.registrar');


Route::get('/dashboard', function () {
    return view('dashboard'); // tu vista Blade con el formulario
});


// Estados
Route::get('/api/estados', [EstadoController::class, 'index']);

// Municipios (todos o filtrados por estado)
Route::get('/api/municipios', [MunicipioController::class, 'index']);
Route::get('/api/municipios/{estadoId}', [MunicipioController::class, 'byEstado']);

// Colonias (todas o filtradas por municipio)
Route::get('/api/colonias', [ColoniaController::class, 'index']);
Route::get('/api/colonias/{municipioId}', [ColoniaController::class, 'byMunicipio']);

// Calles (todas o filtradas por colonia)
Route::get('/api/calles', [CalleController::class, 'index']);
Route::get('/api/calles/{coloniaId}', [CalleController::class, 'byColonia']);

// Habilidades
Route::get('/api/habilidades', [HabilidadController::class, 'index']);
