<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use Inertia\Inertia;
use App\Http\Requests\CargoRequest;

class CargoController extends Controller
{    
    public function index()
    {
        $cargos = Cargo::withTrashed()->latest()->get();

        return Inertia::render('Cargos/Index', compact('cargos'));
    }   
    
    public function create()
    {
        return Inertia::render('Cargos/Create');
    }
    
    public function store(CargoRequest $request)
    {
        $cargo = new Cargo();
        $cargo->codigo = $request->codigo;
        $cargo->nombre = $request->nombre;

        if ($cargo->save()) {
            $result = ['successMessage' => 'Cargo creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el cargo'];
        }

        return redirect()->route('cargos.index')->with($result);
    }
    
    public function show(Cargo $cargo)
    {
        return Inertia::render('Cargos/Show', compact('cargo'));
    }
    
    public function edit(Cargo $cargo)
    {
        return Inertia::render('Cargos/Edit', compact('cargo'));
    }
    
    public function update(CargoRequest $request, Cargo $cargo)
    {
        $cargo->codigo = $request->codigo;
        $cargo->nombre = $request->nombre;

        if ($cargo->update()) {
            $result = ['successMessage' => 'Cargo actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el cargo'];
        }

        return redirect()->route('cargos.index')->with($result);
    }
    
    public function destroy(Cargo $cargo)
    {
        if ($cargo->delete()) {
            $result = ['successMessage' => 'Cargo eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el cargo'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($cargo_id) 
    {                   
        try {
            $cargo = Cargo::withTrashed()->findOrFail($cargo_id);
            $cargo->restore();
            $result = ['successMessage' => 'Cargo restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el cargo'];
            \Log::warning('CargoController@update, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
