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
use App\Http\Controllers\TramiteController;
use App\Http\Controllers\GradoProcedimientoController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\ColacionController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ColacionExpedienteController;

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
Route::get('/autoridades/create', [AutoridadController::class, 'create'])->name('autoridades.create');
Route::post('/autoridades', [AutoridadController::class, 'store'])->name('autoridades.store');
Route::get('/autoridades/{autoridad}', [AutoridadController::class, 'show'])->name('autoridades.show');
Route::get('/autoridades/{autoridad}/edit', [AutoridadController::class, 'edit'])->name('autoridades.edit');
Route::post('/autoridades/{autoridad}', [AutoridadController::class, 'update'])->name('autoridades.update');
Route::delete('/autoridades/{autoridad}', [AutoridadController::class, 'destroy'])->name('autoridades.destroy');
Route::post('/autoridades/{autoridad}/restore', [AutoridadController::class, 'restore'])->name('autoridades.restore');

Route::get('/cargos', [CargoController::class, 'index'])->name('cargos.index');
Route::get('/cargos/create', [CargoController::class, 'create'])->name('cargos.create');
Route::post('/cargos', [CargoController::class, 'store'])->name('cargos.store');
Route::get('/cargos/{cargo}', [CargoController::class, 'show'])->name('cargos.show');
Route::get('/cargos/{cargo}/edit', [CargoController::class, 'edit'])->name('cargos.edit');
Route::post('/cargos/{cargo}', [CargoController::class, 'update'])->name('cargos.update');
Route::delete('/cargos/{cargo}', [CargoController::class, 'destroy'])->name('cargos.destroy');
Route::post('/cargos/{cargo}/restore', [CargoController::class, 'restore'])->name('cargos.restore');

Route::get('/cargosautoridades', [CargoAutoridadController::class, 'index'])->name('cargosautoridades.index');
Route::get('/cargosautoridades/create', [CargoAutoridadController::class, 'create'])->name('cargosautoridades.create');
Route::post('/cargosautoridades', [CargoAutoridadController::class, 'store'])->name('cargosautoridades.store');
Route::get('/cargosautoridades/{cargoautoridad}', [CargoAutoridadController::class, 'show'])->name('cargosautoridades.show');
Route::get('/cargosautoridades/{cargoautoridad}/edit', [CargoAutoridadController::class, 'edit'])->name('cargosautoridades.edit');
Route::post('/cargosautoridades/{cargoautoridad}', [CargoAutoridadController::class, 'update'])->name('cargosautoridades.update');
Route::delete('/cargosautoridades/{cargoautoridad}', [CargoAutoridadController::class, 'destroy'])->name('cargosautoridades.destroy');
Route::post('/cargosautoridades/{cargoautoridad}/restore', [CargoAutoridadController::class, 'restore'])->name('cargosautoridades.restore');

Route::get('/tramites', [TramiteController::class, 'index'])->name('tramites.index');
Route::get('/tramites/create', [TramiteController::class, 'create'])->name('tramites.create');
Route::post('/tramites', [TramiteController::class, 'store'])->name('tramites.store');
Route::get('/tramites/{tramite}', [TramiteController::class, 'show'])->name('tramites.show');
Route::get('/tramites/{tramite}/edit', [TramiteController::class, 'edit'])->name('tramites.edit');
Route::post('/tramites/{tramite}', [TramiteController::class, 'update'])->name('tramites.update');
Route::delete('/tramites/{tramite}', [TramiteController::class, 'destroy'])->name('tramites.destroy');
Route::post('/tramites/{tramite}/restore', [TramiteController::class, 'restore'])->name('tramites.restore');

Route::get('/procedimientos', [ProcedimientoController::class, 'index'])->name('procedimientos.index');
Route::get('/procedimientos/create', [ProcedimientoController::class, 'create'])->name('procedimientos.create');
Route::post('/procedimientos', [ProcedimientoController::class, 'store'])->name('procedimientos.store');
Route::get('/procedimientos/{procedimiento}', [ProcedimientoController::class, 'show'])->name('procedimientos.show');
Route::get('/procedimientos/{procedimiento}/edit', [ProcedimientoController::class, 'edit'])->name('procedimientos.edit');
Route::post('/procedimientos/{procedimiento}', [ProcedimientoController::class, 'update'])->name('procedimientos.update');
Route::delete('/procedimientos/{procedimiento}', [ProcedimientoController::class, 'destroy'])->name('procedimientos.destroy');
Route::post('/procedimientos/{procedimiento}/restore', [ProcedimientoController::class, 'restore'])->name('procedimientos.restore');

Route::get('/rutas', [RutaController::class, 'index'])->name('rutas.index');
Route::get('/rutas/create', [RutaController::class, 'create'])->name('rutas.create');
Route::post('/rutas', [RutaController::class, 'store'])->name('rutas.store');
Route::get('/rutas/{ruta}', [RutaController::class, 'show'])->name('rutas.show');
Route::get('/rutas/{ruta}/edit', [RutaController::class, 'edit'])->name('rutas.edit');
Route::post('/rutas/{ruta}', [RutaController::class, 'update'])->name('rutas.update');
Route::delete('/rutas/{ruta}', [RutaController::class, 'destroy'])->name('rutas.destroy');
Route::post('/rutas/{ruta}/restore', [RutaController::class, 'restore'])->name('rutas.restore');
Route::get('/rutas/getProcedimientos/{idgradomodalidad}', [RutaController::class, 'getProcedimientos'])->name('rutas.getProcedimientos');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');

Route::get('/colaciones', [ColacionController::class, 'index'])->name('colaciones.index');
Route::get('/colaciones/create', [ColacionController::class, 'create'])->name('colaciones.create');
Route::post('/colaciones', [ColacionController::class, 'store'])->name('colaciones.store');
Route::get('/colaciones/{colacion}', [ColacionController::class, 'show'])->name('colaciones.show');
Route::get('/colaciones/{colacion}/edit', [ColacionController::class, 'edit'])->name('colaciones.edit');
Route::post('/colaciones/{colacion}', [ColacionController::class, 'update'])->name('colaciones.update');
Route::delete('/colaciones/{colacion}', [ColacionController::class, 'destroy'])->name('colaciones.destroy');
Route::post('/colaciones/{colacion}/restore', [ColacionController::class, 'restore'])->name('colaciones.restore');

Route::get('/expedientes', [ExpedienteController::class, 'index'])->name('expedientes.index');
Route::get('/expedientes/create', [ExpedienteController::class, 'create'])->name('expedientes.create');
Route::post('/expedientes', [ExpedienteController::class, 'store'])->name('expedientes.store');
Route::get('/expedientes/{expediente}', [ExpedienteController::class, 'show'])->name('expedientes.show');
Route::get('/expedientes/{expediente}/edit', [ExpedienteController::class, 'edit'])->name('expedientes.edit');
Route::post('/expedientes/{expediente}', [ExpedienteController::class, 'update'])->name('expedientes.update');
Route::delete('/expedientes/{expediente}', [ExpedienteController::class, 'destroy'])->name('expedientes.destroy');
Route::post('/expedientes/{expediente}/restore', [ExpedienteController::class, 'restore'])->name('expedientes.restore');

Route::get('/colacionesexpedientes', [ColacionExpedienteController::class, 'index'])->name('colacionesexpedientes.index');
Route::get('/colacionesexpedientes/create', [ColacionExpedienteController::class, 'create'])->name('colacionesexpedientes.create');
Route::post('/colacionesexpedientes', [ColacionExpedienteController::class, 'store'])->name('colacionesexpedientes.store');
Route::get('/colacionesexpedientes/{colacionexpediente}', [ColacionExpedienteController::class, 'show'])->name('colacionesexpedientes.show');
Route::get('/verexpedientes/{idcolacion}', [ColacionExpedienteController::class, 'verexpedientes'])->name('colacionesexpedientes.verexpedientes');
Route::get('/colacionesexpedientes/{colacionexpediente}/edit', [ColacionExpedienteController::class, 'edit'])->name('colacionesexpedientes.edit');
Route::post('/colacionesexpedientes/{colacionexpediente}', [ColacionExpedienteController::class, 'update'])->name('colacionesexpedientes.update');
Route::post('/updateexpedientes', [ColacionExpedienteController::class, 'updateexpedientes'])->name('colacionesexpedientes.updateexpedientes');
Route::delete('/colacionesexpedientes/{colacionexpediente}', [ColacionExpedienteController::class, 'destroy'])->name('colacionesexpedientes.destroy');
Route::post('/colacionesexpedientes/{colacionexpediente}/restore', [ColacionExpedienteController::class, 'restore'])->name('colacionesexpedientes.restore');