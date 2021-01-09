<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ColacionExpediente;
use Illuminate\Http\Request;
use App\Http\Requests\ColacionExpedienteRequest;

class ColacionExpedienteController extends Controller
{
    public function index()
    {
        $cargosautoridades = \DB::table('gt_cargo_autoridades')
                                ->join('gt_cargos', 'gt_cargos.id', '=', 'gt_cargo_autoridades.idcargo')
                                ->join('gt_autoridades', 'gt_autoridades.id', '=', 'gt_cargo_autoridades.idautoridad')
                                ->select('gt_cargo_autoridades.*', 'gt_cargos.nombre as cargo', 'gt_autoridades.nombre as autoridad')
                                ->orderBy('gt_cargo_autoridades.id', 'desc')
                                ->get();        
        
        return Inertia::render('CargosAutoridades/Index', compact('cargosautoridades'));
    }
    
    public function create()
    {
        $cargos = Cargo::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();
        $autoridades = Autoridad::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();

        return Inertia::render('CargosAutoridades/Create', compact('cargos', 'autoridades'));
    }
    
    public function store(CargoAutoridadRequest $request)
    {
        $cargoautoridad = new CargoAutoridad();

        $cargoautoridad->idcargo = $request->idcargo;
        $cargoautoridad->idautoridad = $request->idautoridad;
        $cargoautoridad->fecha_inicio = $request->fecha_inicio;
        $cargoautoridad->fecha_fin = $request->fecha_fin;

        if ($cargoautoridad->save()) {
            $result = ['successMessage' => 'Cargo-Autoridad creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Cargo-Autoridad'];
        }

        return redirect()->route('cargosautoridades.index')->with($result);
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
    
    public function edit(CargoAutoridad $cargoautoridad)
    {
        $cargos = Cargo::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();
        $autoridades = Autoridad::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();
        
        return Inertia::render('CargosAutoridades/Edit', compact('cargoautoridad', 'cargos', 'autoridades'));
    }
    
    public function update(CargoAutoridadRequest $request, CargoAutoridad $cargoautoridad)
    {
        $cargoautoridad->idcargo = $request->idcargo;
        $cargoautoridad->idautoridad = $request->idautoridad;
        $cargoautoridad->fecha_inicio = $request->fecha_inicio;
        $cargoautoridad->fecha_fin = $request->fecha_fin;

        if ($cargoautoridad->update()) {
            $result = ['successMessage' => 'Cargo-Autoridad creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Cargo-Autoridad'];
        }

        return redirect()->route('cargosautoridades.index')->with($result);
    }
    
    public function destroy(CargoAutoridad $cargoautoridad)
    {
        if ($cargoautoridad->delete()) {
            $result = ['successMessage' => 'Cargo-Autoridad creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Cargo-Autoridad'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($cargoautoridad_id) 
    {                   
        try {
            $cargoautoridad = CargoAutoridad::withTrashed()->findOrFail($cargoautoridad_id);
            $cargoautoridad->restore();
            $result = ['successMessage' => 'Cargo-Autoridad restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el cargo-autoridad'];
            \Log::warning('CargoAutoridadController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
