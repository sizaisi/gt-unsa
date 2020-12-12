<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Autoridad;
use Illuminate\Http\Request;
use App\Http\Requests\AutoridadRequest;

class AutoridadController extends Controller
{    
    public function index()
    {
        $autoridades = Autoridad::withTrashed()->latest()->get();

        return Inertia::render('Autoridades/Index', compact('autoridades'));
    }   
    
    public function create()
    {
        return Inertia::render('Autoridades/Create');
    }
    
    public function store(AutoridadRequest $request)
    {
        $autoridad = new Autoridad();
        $autoridad->nombre = $request->nombre;
        $autoridad->grado = $request->grado;

        if ($autoridad->save()) {
            $result = ['successMessage' => 'Autoridad creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la autoridad'];
        }

        return redirect()->route('autoridades.index')->with($result);
    }
    
    public function show(Autoridad $autoridad)
    {
        return Inertia::render('Autoridades/Show', compact('autoridad'));
    }
    
    public function edit(Autoridad $autoridad)
    {
        return Inertia::render('Autoridades/Edit', compact('autoridad'));
    }
    
    public function update(AutoridadRequest $request, Autoridad $autoridad)
    {
        $autoridad->nombre = $request->nombre;
        $autoridad->grado = $request->grado;

        if ($autoridad->update()) {
            $result = ['successMessage' => 'Autoridad actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la autoridad'];
        }

        return redirect()->route('autoridades.index')->with($result);
    }
    
    public function destroy(Autoridad $autoridad)
    {
        if ($autoridad->delete()) {
            $result = ['successMessage' => 'Autoridad eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la autoridad'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($autoridad_id) 
    {                   
        try {
            $autoridad = Autoridad::withTrashed()->findOrFail($autoridad_id);
            $autoridad->restore();
            $result = ['successMessage' => 'Autoridad restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el autoridad'];
            \Log::warning('AutoridadController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
