<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VisitantesController;
use App\Http\Controllers\VisitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Ruta principal
Route::get('/', function () {
    return view('auth.login');
});



// Rutas para Visitas
Route::prefix('visitas')->group(function () {
    Route::get('show', [VisitasController::class, 'index'])->name('visitas.index');
    Route::get('create', [VisitasController::class, 'create'])->name('visitas.create');
    Route::post('store', [VisitasController::class, 'store'])->name('visitas.store');
    Route::get('edit/{id_visita}', [VisitasController::class, 'edit'])->name('visitas.edit'); 
    Route::put('update/{id_visita}', [VisitasController::class, 'update'])->name('visitas.update');
    Route::delete('{id_visita}', [VisitasController::class, 'destroy'])->name('visitas.destroy');
});

// Rutas para Visitantes
Route::prefix('visitantes')->group(function () {
    Route::get('show', [VisitantesController::class, 'index'])->name('visitantes.index'); // Listar visitantes
    Route::get('create', [VisitantesController::class, 'create'])->name('visitantes.create'); // Formulario para crear visitante
    Route::post('store', [VisitantesController::class, 'store'])->name('visitantes.store'); // Almacenar visitante
    Route::get('edit/{id_visitante}', [VisitantesController::class, 'edit'])->name('visitantes.edit'); // Formulario para editar visitante
    Route::put('update/{id_visitante}', [VisitantesController::class, 'update'])->name('visitantes.update'); // Actualizar visitante
    Route::delete('{id_visitante}', [VisitantesController::class, 'destroy'])->name('visitantes.destroy'); // Eliminar visitante
});

//usuario de oficina
Route::prefix('usuarios')->group(function () {
    Route::get('show', [UsuariosController::class, 'index'])->name('usuarios.index'); // Mostrar todos los usuarios
    Route::get('create', [UsuariosController::class, 'create'])->name('usuarios.create'); // Crear usuario
    Route::post('store', [UsuariosController::class, 'store'])->name('usuarios.store'); // Almacenar usuario
    Route::get('edit/{id}', [UsuariosController::class, 'edit'])->name('usuarios.edit'); // Editar usuario
    Route::put('update/{id}', [UsuariosController::class, 'update'])->name('usuarios.update'); // Actualizar usuario
    Route::delete('delete/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy'); // Eliminar usuario
    Route::get('show/{id}', [UsuariosController::class, 'show'])->name('usuarios.show'); // Mostrar detalles del usuario
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
