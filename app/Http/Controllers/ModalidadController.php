<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modalidad;
use Inertia\Inertia;
use App\Http\Requests\ModalidadRequest;

class ModalidadController extends Controller
{
    public function index()
    {
        $modalidades = Modalidad::withTrashed()->latest()->get();

        return Inertia::render('Modalidades/Index', compact('modalidades'));
    }  

    public function create()
    {
        return Inertia::render('Modalidades/Create');
    }

    public function store(ModalidadRequest $request)
    {
        $modalidad = new Modalidad();
        $modalidad->nombre = $request->nombre;

        if ($modalidad->save()) {
            $result = ['successMessage' => 'Modalidad creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la modalidad'];
        }

        return redirect()->route('modalidades.index')->with($result);
    }

    public function show(Modalidad $modalidad)
    {
        return Inertia::render('Modalidades/Show', compact('modalidad'));
    }

    public function edit(Modalidad $modalidad)
    {        
        return Inertia::render('Modalidades/Edit', compact('modalidad'));
    }

    public function update(ModalidadRequest $request, Modalidad $modalidad)
    {
        $modalidad->nombre = $request->nombre;

        if ($modalidad->update()) {
            $result = ['successMessage' => 'Modalidad actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la modalidad'];
        }

        return redirect()->route('modalidades.index')->with($result);
    }

    public function destroy(Modalidad $modalidad)
    {       
        if ($modalidad->delete()) {
            $result = ['successMessage' => 'Modalidad eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la modalidad'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($modalidad_id) 
    {              
        try {
            $modalidad = Modalidad::withTrashed()->findOrFail($modalidad_id);
            $modalidad->restore();
            $result = ['successMessage' => 'Modalidad restaurada con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar la modalidad'];
            \Log::warning('ModalidadController@update, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
