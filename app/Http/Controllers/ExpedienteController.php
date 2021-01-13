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
    }    
    
    public function show(Expediente $expediente)
    {
        return Inertia::render('Expedientes/Show', compact('expediente'));
    }
}
