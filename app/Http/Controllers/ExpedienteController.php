<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Http\Requests\ExpedienteRequest;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::withTrashed()->latest()->get();

        return Inertia::render('Expedientes/Index', compact('expedientes'));

        $expedientes = \DB::table('gt_expediente')
                                ->join('gt_graduando_expediente', 'gt_cargos.id', '=', 'gt_cargo_autoridades.idcargo')
                                ->join('gt_graduando', 'gt_autoridades.id', '=', 'gt_cargo_autoridades.idautoridad')
                                ->select('gt_cargo_autoridades.*', 'gt_cargos.nombre as cargo', 'gt_autoridades.nombre as autoridad')
                                ->orderBy('gt_cargo_autoridades.id', 'desc')
                                ->get();        
        
        return Inertia::render('CargosAutoridades/Index', compact('cargosautoridades'));
    }   
    
    public function show(Expediente $expediente)
    {
        return Inertia::render('Expedientes/Show', compact('expediente'));
    }
}
