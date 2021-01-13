<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ColacionExpediente;
use App\Models\Colacion;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Http\Requests\ColacionExpedienteRequest;
use App\Models\Income;

class ColacionExpedienteController extends Controller
{
    public function index()
    {     
        
        $colaciones = \DB::table('gt_colaciones')->orderBy('id', 'desc')->get();
        $colacion_id = Colacion::select('id')->get();
        $expedientes = \DB::table('gt_expediente')
                        ->whereIn('id', function($query) use ($colacion_id){
                            $query->select('idexpediente')
                                ->from('gt_colacion_expedientes')
                                ->where('idcolacion', 1);
                        })
                        ->get();
        return Inertia::render('ColacionesExpedientes/Index', compact('colaciones', 'expedientes'));
    }
    
    public function create()
    {
        $colaciones = \DB::table('gt_colaciones')->orderBy('id', 'desc')->get();
        $expedientes = \DB::table('gt_expediente')->orderBy('id', 'desc')->get();

        return Inertia::render('ColacionesExpedientes/Index', compact('colaciones', 'expedientes'));
    }
    
    public function store(ColacionExpedienteRequest $request)
    {
        $colacionexpediente = new ColacionExpediente();

        $colacionexpediente->idcolacion = $request->idcolacion;
        $colacionexpediente->idxpediente = $request->idxpediente;

        if ($colacionexpediente->save()) {
            $result = ['successMessage' => 'Colación - Expediente creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la Colación - Expediente'];
        }

        return redirect()->route('colacionesexpedientes.index')->with($result);
    }
    
    public function show(CargoAutoridad $cargoautoridad)
    {
        $cargoautoridad = \DB::table('gt_cargo_autoridades')
                                ->join('gt_cargos', 'gt_cargos.id', '=', 'gt_cargo_autoridades.idcargo')
                                ->join('gt_autoridades', 'gt_autoridades.id', '=', 'gt_cargo_autoridades.idautoridad')
                                ->select('gt_cargo_autoridades.*', 'gt_cargos.nombre as cargo', 'gt_autoridades.nombre as autoridad')
                                ->where('gt_cargo_autoridades.id', $cargoautoridad->id)                                
                                ->first();        
        
        return Inertia::render('CargosAutoridades/Show', compact('cargoautoridad'));
    }
    
    public function edit(ColacionExpediente $colacionexpediente)
    {
        $colaciones = \DB::table('gt_colaciones')->orderBy('id', 'desc')->get();
        $expedientes = \DB::table('gt_expediente')->orderBy('id', 'desc')->get();
        
        return Inertia::render('CargosAutoridades/Edit', compact('colacionexpediente', 'colaciones', 'expedientes'));
    }
    
    public function update(ColacionExpedienteRequest $request, ColacionExpediente $colacionexpediente)
    {
        $colacionexpediente->idcolacion = $request->idcolacion;
        $colacionexpediente->idxpediente = $request->idxpediente;

        if ($colacionexpediente->update()) {
            $result = ['successMessage' => 'Colación - Expediente creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la Colación - Expediente'];
        }

        return redirect()->route('colacionesexpedientes.index')->with($result);
    }
    
    public function destroy(ColacionExpediente $colacionexpediente)
    {
        if ($colacionexpediente->delete()) {
            $result = ['successMessage' => 'Colación - Expediente desactivado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo desactivar la Colación - Expediente'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($colacionexpediente_id) 
    {                   
        try {
            $colacionexpediente = ColacionExpediente::withTrashed()->findOrFail($colacionexpediente_id);
            $colacionexpediente->restore();
            $result = ['successMessage' => 'Colación - Expediente restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar la Colación - Expediente'];
            \Log::warning('ColacionExpedienteController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
