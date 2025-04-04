<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use App\Http\Controllers\ArchivoController;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

//  Gestión de perfil (todos los autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Gestión de usuarios (solo admins con middleware personalizado 'admin')
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});

// Gestión de archivos (protección por permisos individuales)
Route::middleware(['auth'])->group(function () {
    Route::get('/archivos', [ArchivoController::class, 'index'])
        ->middleware('permission:ver archivos')
        ->name('files.index');

    Route::post('/archivos', [ArchivoController::class, 'store'])
        ->middleware('permission:subir archivos')
        ->name('files.store');

    Route::delete('/archivos/{archivo}', [ArchivoController::class, 'destroy'])
        ->middleware('permission:eliminar archivos')
        ->name('files.destroy');
});

require __DIR__ . '/auth.php';
