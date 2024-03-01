<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPeliculaController;
use App\Http\Controllers\Admin\AdminCancionesController;
use App\Http\Controllers\Admin\AdminCategoriaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Auth\RegisteredUserController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas de autenticación
require __DIR__ . '/auth.php';

// Rutas accesibles sin necesidad de autenticación
Route::resource('peliculas', PeliculaController::class);
Route::resource('canciones', CancionController::class);
Route::resource('categorias', CategoriaController::class);



// Rutas generales para todos los usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rutas de administración que requieren autenticación
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Rutas para la gestión de películas, canciones y categorías en el área de administración
    Route::resource('peliculas', AdminPeliculaController::class)->names('peliculas');
    Route::resource('canciones', AdminCancionesController::class)
         ->parameters(['canciones' => 'cancion']) // Especifica el parámetro en singular para las rutas de canciones
         ->names('canciones'); // Define los nombres de las rutas de recurso para canciones
    Route::resource('categorias', AdminCategoriaController::class)->names('categorias');
});
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);


// Rutas para el perfil del usuario que requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
