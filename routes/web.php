<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\AutoridadController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ProcedimientoController;
use App\Http\Controllers\ProgramaEstudioController;
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

Route::get('/autoridades', [AutoridadController::class, 'index'])->name('autoridades.index');
Route::get('/autoridades/create', [AutoridadController::class, 'create'])->name('autoridades.create');
Route::post('/autoridades', [AutoridadController::class, 'store'])->name('autoridades.store');
Route::get('/autoridades/{autoridad}', [AutoridadController::class, 'show'])->name('autoridades.show');
Route::get('/autoridades/{autoridad}/edit', [AutoridadController::class, 'edit'])->name('autoridades.edit');
Route::put('/autoridades/{autoridad}', [AutoridadController::class, 'update'])->name('autoridades.update');
Route::delete('/autoridades/{autoridad}', [AutoridadController::class, 'destroy'])->name('autoridades.destroy');

Route::get('/cargos', [CargoController::class, 'index'])->name('cargos.index');
Route::get('/cargos/create', [CargoController::class, 'create'])->name('cargos.create');
Route::post('/cargos', [CargoController::class, 'store'])->name('cargos.store');
Route::get('/cargos/{cargo}', [CargoController::class, 'show'])->name('cargos.show');
Route::get('/cargos/{cargo}/edit', [CargoController::class, 'edit'])->name('cargos.edit');
Route::put('/cargos/{cargo}', [CargoController::class, 'update'])->name('cargos.update');
Route::delete('/cargos/{cargo}', [CargoController::class, 'destroy'])->name('cargos.destroy');

Route::get('/procedimientos', [ProcedimientoController::class, 'index'])->name('procedimientos.index');
Route::get('/procedimientos/create', [ProcedimientoController::class, 'create'])->name('procedimientos.create');
Route::post('/procedimientos', [ProcedimientoController::class, 'store'])->name('procedimientos.store');
Route::get('/procedimientos/{procedimiento}', [ProcedimientoController::class, 'show'])->name('procedimientos.show');
Route::get('/procedimientos/{procedimiento}/edit', [ProcedimientoController::class, 'edit'])->name('procedimientos.edit');
Route::put('/procedimientos/{procedimiento}', [ProcedimientoController::class, 'update'])->name('procedimientos.update');
Route::delete('/procedimientos/{procedimiento}', [ProcedimientoController::class, 'destroy'])->name('procedimientos.destroy');

Route::get('/programas', [ProgramaEstudioController::class, 'index'])->name('programas.index');
Route::get('/programas/create', [ProgramaEstudioController::class, 'create'])->name('programas.create');
Route::post('/programas', [ProgramaEstudioController::class, 'store'])->name('programas.store');
Route::get('/programas/{programa}', [ProgramaEstudioController::class, 'show'])->name('programas.show');
Route::get('/programas/{programa}/edit', [ProgramaEstudioController::class, 'edit'])->name('programas.edit');
Route::put('/programas/{programa}', [ProgramaEstudioController::class, 'update'])->name('programas.update');
Route::delete('/programas/{programa}', [ProgramaEstudioController::class, 'destroy'])->name('programas.destroy');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
