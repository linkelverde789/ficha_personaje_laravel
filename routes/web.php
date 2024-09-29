<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');
Route::get('/test', function () {
    return 'Perfe';
});

use App\Http\Controllers\UsuarioController;

Route::get('/crear-usuario', function () {
    return view('crear_usuario');  // Mostrar el formulario de creación
})->name('crear.usuario');

Route::post('/usuarios', [UsuarioController::class, 'store']);  // Ruta para procesar la inserción


Route::get('/dados', function () {
    return view('dados');
})->name('lanzar.dados');

use App\Http\Controllers\AuthController;


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\ObtenerPersonajesController;
Route::get('home', [ObtenerPersonajesController::class, 'obtenerPersonajes'])->name('home');

use App\Http\Controllers\CrearPersonajeController;
Route::get('/crearPersonaje', [CrearPersonajeController::class, 'showCharacterForm'])->name('crearPersonaje');
Route::post('/insertarPersonaje', [CrearPersonajeController::class, 'store'])->name('insertarPersonaje');

// Procesar la creación de los diferentes objetos
use App\Http\Controllers\InventarioController;
Route::post('insertarArma', [InventarioController::class, 'insertarArma'])->name('insertarArma');
Route::post('insertarArmadura', [InventarioController::class, 'insertarArmadura'])->name('insertarArmadura');
Route::post('insertarEscudo', [InventarioController::class, 'insertarEscudo'])->name('insertarEscudo');
Route::post('insertarObjeto', [InventarioController::class, 'insertarObjeto'])->name('insertarObjeto');

// Cargar inventario
Route::get('inventario', [InventarioController::class, 'gestionarInventario'])->name('inventario');


//Equipar elementos
Route::get('/armas/equipar/{id}', [InventarioController::class, 'equiparArma'])->name('armas.equipar');

//Eliminar elementos
Route::get('/armas/eliminar/{id}', [InventarioController::class, 'eliminarArma'])->name('armas.eliminar');


//Desequipar elementos
