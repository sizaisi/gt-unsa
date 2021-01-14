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
        $expedientes = \DB::table('gt_expediente')
        ->leftjoin('gt_graduando_expediente', 'gt_graduando_expediente.idexpediente', '=', 'gt_expediente.id')
        ->leftjoin('gt_graduando', 'gt_graduando.id', '=', 'gt_graduando_expediente.idgraduando')
        ->leftjoin('actescu', 'actescu.nues', '=', 'gt_expediente.nues')
        ->leftjoin('gt_procedimientos', 'gt_procedimientos.id', '=', 'gt_expediente.idprocedimiento')
        ->leftjoin('gt_tramites', 'gt_tramites.id', '=', 'gt_procedimientos.idtramite')
        ->leftjoin('gt_roles', 'gt_roles.id', '=', 'gt_procedimientos.idrol')
        ->leftjoin('gt_colaciones', 'gt_colaciones.id', '=', 'gt_expediente.idcolacion')
        ->select('gt_expediente.*', 'gt_graduando.id as idgraduando', 'gt_graduando.cui as cui', 
        'gt_graduando.name as nombre', 'gt_graduando.email as email', 'gt_graduando.telefono_movil as celular', 'gt_graduando.direccion as direccion',
        'actescu.nesc as escuela', 'gt_procedimientos.nombre as procedimiento', 'gt_tramites.nombre as modalidadobtencion',
        'gt_roles.nombre as rol', 'gt_colaciones.fecha as fecha_colacion')
        ->get();          

        return Inertia::render('Expedientes/Index', compact('expedientes'));
    }    
    
    public function show(Expediente $expediente)
    {
        return Inertia::render('Expedientes/Show', compact('expediente'));
    }
}