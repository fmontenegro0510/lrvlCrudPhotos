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
    Route::resource('concursos', ConcursoController::class);

    // Rutas para los concursos de un postulante
gi

    
    Route::get('/postulantes', [PostulanteController::class, 'index'])->name('postulantes.index');
    Route::get('/postulantes/create', [PostulanteController::class, 'create'])->name('postulantes.create');
    Route::post('/postulantes', [PostulanteController::class, 'store'])->name('postulantes.store');
    Route::get('/postulantes/{postulante}', [PostulanteController::class, 'show'])->name('postulantes.show');
    Route::get('/postulantes/{postulante}/edit', [PostulanteController::class, 'edit'])->name('postulantes.edit');
    Route::put('/postulantes/{postulante}', [PostulanteController::class, 'update'])->name('postulantes.update');
    Route::delete('/postulantes/{postulante}', [PostulanteController::class, 'destroy'])->name('postulantes.destroy');
    
    // Rutas para los concursos relacionados con un postulante
    Route::get('/postulantes/{postulante}/concursos', [ConcursoController::class, 'index'])->name('concursos.index');
    Route::get('/postulantes/{postulante}/concursos/create', [ConcursoController::class, 'create'])->name('concursos.create');
    Route::post('/postulantes/{postulante}/concursos', [ConcursoController::class, 'store'])->name('concursos.store');
    Route::get('/postulantes/{postulante}/concursos/{concurso}', [ConcursoController::class, 'show'])->name('concursos.show');
    Route::get('/postulantes/{postulante}/concursos/{concurso}/edit', [ConcursoController::class, 'edit'])->name('concursos.edit');
    Route::put('/postulantes/{postulante}/concursos/{concurso}', [ConcursoController::class, 'update'])->name('concursos.update');
    Route::delete('/postulantes/{postulante}/concursos/{concurso}', [ConcursoController::class, 'destroy'])->name('concursos.destroy');



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