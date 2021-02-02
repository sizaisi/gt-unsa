<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Universidad;
use Illuminate\Http\Request;
use App\Http\Requests\UniversidadRequest;


class UniversidadController extends Controller
{
    public function index()
    {
        $universidades = Universidad::withTrashed()->latest()->get();

        return Inertia::render('Universidades/Index', compact('universidades'));
    }   
    
    public function create()
    {
        return Inertia::render('Universidades/Create');
    }
    
    public function store(UniversidadRequest $request)
    {
        $universidad = new Universidad();
        $universidad->cod_universidad = $request->cod_universidad;
        $universidad->razon_social = $request->razon_social;
        $universidad->estado = 1;


        if ($universidad->save()) {
            $result = ['successMessage' => 'Universidad creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la Universidad'];
        }

        return redirect()->route('universidades.index')->with($result);
    }
    
    public function show(Universidad $universidad)
    {
        return Inertia::render('Universidades/Show', compact('universidad'));
    }
    
    public function edit(Universidad $universidad)
    {
        return Inertia::render('Universidades/Edit', compact('universidad'));
    }
    
    public function update(UniversidadRequest $request, Universidad $universidad)
    {
        $universidad->cod_universidad = $request->cod_universidad;
        $universidad->razon_social = $request->razon_social;
        $universidad->estado = $request->estado;

        if ($universidad->update()) {
            $result = ['successMessage' => 'Universidad actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la Universidad'];
        }

        return redirect()->route('universidades.index')->with($result);
    }
    
    public function destroy(Universidad $universidad)
    {
        if ($universidad->delete()) {
            $result = ['successMessage' => 'Universidad eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la Universidad'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($universidad_id) 
    {                   
        try {
            $universidad = Universidad::withTrashed()->findOrFail($universidad_id);
            $universidad->restore();
            $result = ['successMessage' => 'Universidad restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el Universidad'];
            \Log::warning('UniversidadController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
