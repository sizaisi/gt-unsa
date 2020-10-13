<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/welcome', function () {
    return Inertia\Inertia::render('Welcome');
})->name('welcome');

Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RolController::class, 'create'])->name('roles.create');
Route::post('/roles', [RolController::class, 'store'])->name('roles.store');
Route::get('/roles/{rol}', [RolController::class, 'show'])->name('roles.show');
Route::get('/roles/{rol}/edit', [RolController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{rol}', [RolController::class, 'update'])->name('roles.update');
Route::delete('/roles/{rol}', [RolController::class, 'destroy'])->name('roles.destroy');

Route::get('/modalidades', [ModalidadController::class, 'index'])->name('modalidades.index');
Route::get('/modalidades/create', [ModalidadController::class, 'create'])->name('modalidades.create');
Route::post('/modalidades', [ModalidadController::class, 'store'])->name('modalidades.store');
Route::get('/modalidades/{modalidad}', [ModalidadController::class, 'show'])->name('modalidades.show');
Route::get('/modalidades/{modalidad}/edit', [ModalidadController::class, 'edit'])->name('modalidades.edit');
Route::put('/modalidades/{modalidad}', [ModalidadController::class, 'update'])->name('modalidades.update');
Route::delete('/modalidades/{modalidad}', [ModalidadController::class, 'destroy'])->name('modalidades.destroy');






Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
