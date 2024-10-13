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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta principal
Route::get('/', function () {
    return view('auth.login');
});


Route::prefix('visitas')->group(function () {
    Route::get('show', [VisitasController::class, 'index'])->name('visitas.index');
    Route::get('create', [VisitasController::class, 'create'])->name('visitas.create');
    Route::post('store', [VisitasController::class, 'store'])->name('visitas.store');
    Route::get('edit/{id_visita}', [VisitasController::class, 'edit'])->name('visitas.edit'); 
    Route::put('update/{id_visita}', [VisitasController::class, 'update'])->name('visitas.update');
    Route::delete('{id_visita}', [VisitasController::class, 'destroy'])->name('visitas.destroy');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');