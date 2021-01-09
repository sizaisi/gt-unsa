<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Colacion;
use Illuminate\Http\Request;
use App\Http\Requests\ColacionRequest;

class ColacionController extends Controller
{
    public function index()
    {
        $colaciones = Colacion::withTrashed()->latest()->get();

        return Inertia::render('Colaciones/Index', compact('colaciones'));
    }   
    
    public function create()
    {
        return Inertia::render('Colaciones/Create');
    }
    
    public function store(ColacionRequest $request)
    {
        $colacion = new Colacion();
        $colacion->fecha = $request->fecha;
        $colacion->horainicio = $request->horainicio;
        $colacion->horafin = $request->horafin;
        $colacion->cantidad = $request->cantidad;
        $colacion->maximo = $request->maximo;

        if ($colacion->save()) {
            $result = ['successMessage' => 'Colación creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la colación'];
        }

        return redirect()->route('colaciones.index')->with($result);
    }
    
    public function show(Colacion $colacion)
    {
        return Inertia::render('Colaciones/Show', compact('colacion'));
    }
    
    public function edit(Colacion $colacion)
    {
        return Inertia::render('Colaciones/Edit', compact('colacion'));
    }
    
    public function update(ColacionRequest $request, Colacion $colacion)
    {
        $colacion->fecha = $request->fecha;
        $colacion->horainicio = $request->horainicio;
        $colacion->horafin = $request->horafin;
        $colacion->cantidad = $request->cantidad;
        $colacion->maximo = $request->maximo;

        if ($colacion->update()) {
            $result = ['successMessage' => 'Colación actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la colación'];
        }

        return redirect()->route('colaciones.index')->with($result);
    }
    
    public function destroy(Colacion $colacion)
    {
        if ($colacion->delete()) {
            $result = ['successMessage' => 'Colación eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la colación'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($colacion_id) 
    {                   
        try {
            $colacion = Colacion::withTrashed()->findOrFail($colacion_id);
            $colacion->restore();
            $result = ['successMessage' => 'Colación restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar la colación'];
            \Log::warning('ColacionController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
