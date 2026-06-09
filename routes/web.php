<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Perfil personalizado
    Route::get('/perfil/actualizar', [UsuarioController::class, 'getActualizar'])
        ->name('perfil.actualizar');

    Route::post('/perfil/actualizar', [UsuarioController::class, 'postActualizar'])
        ->name('perfil.guardar');

    // CRUD Álbumes
    Route::get('/albumes', [AlbumController::class, 'index'])
        ->name('albumes.index');

    Route::get('/albumes/create', [AlbumController::class, 'create'])
        ->name('albumes.create');

    Route::post('/albumes', [AlbumController::class, 'store'])
        ->name('albumes.store');

    Route::get('/albumes/{id}/edit', [AlbumController::class, 'edit'])
        ->name('albumes.edit');

    Route::put('/albumes/{id}', [AlbumController::class, 'update'])
        ->name('albumes.update');

    Route::delete('/albumes/{id}', [AlbumController::class, 'destroy'])
        ->name('albumes.destroy');

    // Fotos
    Route::get('/album/{id}/fotos', [FotoController::class, 'index'])
        ->name('fotos.index');
});

require __DIR__.'/auth.php';