<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\CalleController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\MostrarTareasController;


// --- PÁGINAS PÚBLICAS ---

Route::get('/', function () {
    return view('home');    
})->name('home');


Route::get('/home', function () {
    return view('home');
});

Route::get('/SinTerminarEmpleado', function () {
    return view('Empleado.SinTerminarEmpleado');
});

// --- AUTENTICACIÓN ---

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login'); // Es importante llamar 'login' a esta ruta para los redireccionamientos de Laravel

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Registro
Route::get('/registro', function () {
    return view('auth.registro'); 
})->name('registro');

Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.registrar');


// --- ZONA PRIVADA (DASHBOARDS) ---

Route::get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');



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

Route::get('/postulacion/{id}', [PostulacionController::class, 'create'])->name('postulacion.create');
//Route::post('/postularse/{tareaId}', [PostulacionController::class, 'store'])->name('postularse.store');


//FALTANTES

//Dashboard

// Empleado
//Route::get('/dashboardEmpleado', function () {
    //return view('Empleado.dashboardEmpleado'); 
//})->name('empleado.dashboardEmpleado');

Route::get('/detalles', function () {
    return view('Empleado.detalles'); 
})->name('empleado.detalles');

Route::get('/pagosdetalles', function () {
    return view('Empleado.pagosdetalles'); 
})->name('empleado.pagos');

Route::get('/perfilempleado', function () {
    return view('Empleado.perfilempleado'); 
})->name('empleado.perfilEmpleado');;


Route::get('/dashboardEmpleado', [MostrarTareasController::class, 'dashboardEmpleado'])
     ->name('empleado.dashboardEmpleado');

// Empleador
Route::get('/dashboardEmpleador', function () {
    return view('Empleador.dashboardEmpleador'); 
})->name('empleador.dashboardEmpleador');

Route::get('/detalleEmpleador', function () {
    return view('Empleador.detalleEmpleador'); 
})->name('empleador.detalles');

Route::get('/perfilempleador', function () {
    return view('Empleador.perfilempleador');
})->name('empleador.perfil');

Route::get('/metodoPago', function () {
    return view('Empleador.metodoPago'); 
})->name('empleador.pago');



// --- API / SELECTORES DINÁMICOS ---
// (Estas rutas devuelven JSON para tus dropdowns de ubicación)

#Route::get('/api/estados', [EstadoController::class, 'index']);
#Route::get('/api/municipios', [MunicipioController::class, 'index']);
#Route::get('/api/municipios/{estadoId}', [MunicipioController::class, 'byEstado']);
#Route::get('/api/colonias', [ColoniaController::class, 'index']);
#Route::get('/api/colonias/{municipioId}', [ColoniaController::class, 'byMunicipio']);
#Route::get('/api/calles', [CalleController::class, 'index']);
#Route::get('/api/calles/{coloniaId}', [CalleController::class, 'byColonia']);
#Route::get('/api/habilidades', [HabilidadController::class, 'index']);
