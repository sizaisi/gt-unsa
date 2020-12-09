<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\AutoridadController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ProcedimientoController;
use App\Http\Controllers\ProgramaEstudioController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\CargoAutoridadController;
use App\Http\Controllers\GradoModalidadController;
use App\Http\Controllers\GradoProcedimientoController;
use App\Http\Controllers\RutaController;

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
Route::post('/roles/{rol}', [RolController::class, 'update'])->name('roles.update');
Route::delete('/roles/{rol}', [RolController::class, 'destroy'])->name('roles.destroy');
Route::post('/roles/{rol}/restore', [RolController::class, 'restore'])->name('roles.restore');

Route::get('/grados', [GradoController::class, 'index'])->name('grados.index');
Route::get('/grados/create', [GradoController::class, 'create'])->name('grados.create');
Route::post('/grados', [GradoController::class, 'store'])->name('grados.store');
Route::get('/grados/{grado}', [GradoController::class, 'show'])->name('grados.show');
Route::get('/grados/{grado}/edit', [GradoController::class, 'edit'])->name('grados.edit');
Route::post('/grados/{grado}', [GradoController::class, 'update'])->name('grados.update');
Route::delete('/grados/{grado}', [GradoController::class, 'destroy'])->name('grados.destroy');
Route::post('/grados/{grado}/restore', [GradoController::class, 'restore'])->name('grados.restore');

Route::get('/modalidades', [ModalidadController::class, 'index'])->name('modalidades.index');
Route::get('/modalidades/create', [ModalidadController::class, 'create'])->name('modalidades.create');
Route::post('/modalidades', [ModalidadController::class, 'store'])->name('modalidades.store');
Route::get('/modalidades/{modalidad}', [ModalidadController::class, 'show'])->name('modalidades.show');
Route::get('/modalidades/{modalidad}/edit', [ModalidadController::class, 'edit'])->name('modalidades.edit');
Route::post('/modalidades/{modalidad}', [ModalidadController::class, 'update'])->name('modalidades.update');
Route::delete('/modalidades/{modalidad}', [ModalidadController::class, 'destroy'])->name('modalidades.destroy');
Route::post('/modalidades/{modalidad}/restore', [ModalidadController::class, 'restore'])->name('modalidades.restore');

Route::get('/autoridades', [AutoridadController::class, 'index'])->name('autoridades.index');
Route::get('/getautoridades', [AutoridadController::class, 'getautoridades'])->name('autoridades.getautoridades');
Route::get('/autoridades/create', [AutoridadController::class, 'create'])->name('autoridades.create');
Route::post('/autoridades', [AutoridadController::class, 'store'])->name('autoridades.store');
Route::get('/autoridades/{autoridad}', [AutoridadController::class, 'show'])->name('autoridades.show');
Route::get('/autoridades/{autoridad}/edit', [AutoridadController::class, 'edit'])->name('autoridades.edit');
Route::put('/autoridades/{autoridad}', [AutoridadController::class, 'update'])->name('autoridades.update');
Route::delete('/autoridades/{autoridad}', [AutoridadController::class, 'destroy'])->name('autoridades.destroy');

Route::get('/cargos', [CargoController::class, 'index'])->name('cargos.index');
Route::get('/getcargos', [CargoController::class, 'getcargos'])->name('cargos.getcargos');
Route::get('/cargos/create', [CargoController::class, 'create'])->name('cargos.create');
Route::post('/cargos', [CargoController::class, 'store'])->name('cargos.store');
Route::get('/cargos/{cargo}', [CargoController::class, 'show'])->name('cargos.show');
Route::get('/cargos/{cargo}/edit', [CargoController::class, 'edit'])->name('cargos.edit');
Route::put('/cargos/{cargo}', [CargoController::class, 'update'])->name('cargos.update');
Route::delete('/cargos/{cargo}', [CargoController::class, 'destroy'])->name('cargos.destroy');

Route::get('/procedimientos', [ProcedimientoController::class, 'index'])->name('procedimientos.index');
Route::get('/getprocedimientos', [ProcedimientoController::class, 'getprocedimientos'])->name('procedimientos.getprocedimientos');
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

Route::get('/cargosautoridades', [CargoAutoridadController::class, 'index'])->name('cargosautoridades.index');
Route::get('/cargosautoridades/create', [CargoAutoridadController::class, 'create'])->name('cargosautoridades.create');
Route::post('/cargosautoridades', [CargoAutoridadController::class, 'store'])->name('cargosautoridades.store');
Route::get('/cargosautoridades/{cargoautoridad}', [CargoAutoridadController::class, 'show'])->name('cargosautoridades.show');
Route::get('/cargosautoridades/{cargoautoridad}/edit', [CargoAutoridadController::class, 'edit'])->name('cargosautoridades.edit');
Route::put('/cargosautoridades/{cargoautoridad}', [CargoAutoridadController::class, 'update'])->name('cargosautoridades.update');
Route::delete('/cargosautoridades/{cargoautoridad}', [CargoAutoridadController::class, 'destroy'])->name('cargosautoridades.destroy');

Route::get('/gradosmodalidades', [GradoModalidadController::class, 'index'])->name('gradosmodalidades.index');
Route::get('/getgradosmodalidades', [GradoModalidadController::class, 'getgradosmodalidades'])->name('gradosmodalidades.getgradosmodalidades');
Route::get('/gradosmodalidades/create', [GradoModalidadController::class, 'create'])->name('gradosmodalidades.create');
Route::post('/gradosmodalidades', [GradoModalidadController::class, 'store'])->name('gradosmodalidades.store');
Route::get('/gradosmodalidades/{gradomodalidad}', [GradoModalidadController::class, 'show'])->name('gradosmodalidades.show');
Route::get('/gradosmodalidades/{gradomodalidad}/edit', [GradoModalidadController::class, 'edit'])->name('gradosmodalidades.edit');
Route::post('/gradosmodalidades/{gradomodalidad}', [GradoModalidadController::class, 'update'])->name('gradosmodalidades.update');
Route::delete('/gradosmodalidades/{gradomodalidad}', [GradoModalidadController::class, 'destroy'])->name('gradosmodalidades.destroy');
Route::post('/gradosmodalidades/{gradomodalidad}/restore', [GradoModalidadController::class, 'restore'])->name('gradosmodalidades.restore');

Route::get('/gradosprocedimientos', [GradoProcedimientoController::class, 'index'])->name('gradosprocedimientos.index');
Route::get('/gradosprocedimientos/create', [GradoProcedimientoController::class, 'create'])->name('gradosprocedimientos.create');
Route::post('/gradosprocedimientos', [GradoProcedimientoController::class, 'store'])->name('gradosprocedimientos.store');
Route::get('/gradosprocedimientos/{gradoprocedimiento}', [GradoProcedimientoController::class, 'show'])->name('gradosprocedimientos.show');
Route::get('/gradosprocedimientos/{gradoprocedimiento}/edit', [GradoProcedimientoController::class, 'edit'])->name('gradosprocedimientos.edit');
Route::put('/gradosprocedimientos/{gradoprocedimiento}', [GradoProcedimientoController::class, 'update'])->name('gradosprocedimientos.update');
Route::delete('/gradosprocedimientos/{gradoprocedimiento}', [GradoProcedimientoController::class, 'destroy'])->name('gradosprocedimientos.destroy');

Route::get('/rutas', [RutaController::class, 'index'])->name('rutas.index');
Route::get('/rutas/create', [RutaController::class, 'create'])->name('rutas.create');
Route::post('/rutas', [RutaController::class, 'store'])->name('rutas.store');
Route::get('/rutas/{ruta}', [RutaController::class, 'show'])->name('rutas.show');
Route::get('/rutas/{ruta}/edit', [RutaController::class, 'edit'])->name('rutas.edit');
Route::put('/rutas/{ruta}', [RutaController::class, 'update'])->name('rutas.update');
Route::delete('/rutas/{ruta}', [RutaController::class, 'destroy'])->name('rutas.destroy');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
