<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\ConcursoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas autenticadas
Route::middleware('auth')->group(function () {
    // Rutas para los postulantes
    Route::resource('postulantes', PostulanteController::class);

    // Rutas para los concursos de un postulante
    Route::get('postulantes/{postulante}/concursos/create', [ConcursoController::class, 'create'])->name('concursos.create');
    Route::post('postulantes/{postulante}/concursos', [ConcursoController::class, 'store'])->name('concursos.store');
    Route::get('postulantes/{postulante}/concursos/{concurso}/edit', [ConcursoController::class, 'edit'])->name('concursos.edit');
    Route::put('postulantes/{postulante}/concursos/{concurso}', [ConcursoController::class, 'update'])->name('concursos.update');
    Route::delete('postulantes/{postulante}/concursos/{concurso}', [ConcursoController::class, 'destroy'])->name('concursos.destroy');
});

// Rutas para la autenticación y registro de usuarios
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Ruta para cerrar sesión
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');