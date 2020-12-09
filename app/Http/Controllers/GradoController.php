<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Http\Requests\GradoRequest;

class GradoController extends Controller
{    
    public function index()
    {        
        $grados = \DB::table('gt_grados as t1')
                        ->leftJoin('gt_grados as t2', 't2.id', '=', 't1.prerequisito')
                        ->select('t1.*', 't2.nombre as prerequisito')
                        ->orderBy('t1.id', 'desc')
                        ->get();
        
        return Inertia::render('Grados/Index', compact('grados'));
    } 

    public function create()
    {
        $grados = Grado::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();

        return Inertia::render('Grados/Create', compact('grados'));
    }

    public function store(GradoRequest $request)
    {
        $grado = new Grado();
        $grado->nombre = $request->nombre;
        $grado->nive = $request->nive;
        $grado->codigo = $request->codigo;
        $grado->prerequisito = $request->prerequisito;        

        if ($grado->save()) {
            $result = ['successMessage' => 'Grado creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el grado'];
        }

        return redirect()->route('grados.index')->with($result);
    }

    public function show(Grado $grado)
    {
        return Inertia::render('Grados/Show', compact('grado'));
    }

    public function edit(Grado $grado)
    {
        $grados = Grado::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();

        return Inertia::render('Grados/Edit', compact('grado', 'grados'));
    }

    public function update(GradoRequest $request, Grado $grado)
    {
        $grado->nombre = $request->nombre;
        $grado->nive = $request->nive;
        $grado->codigo = $request->codigo;
        $grado->prerequisito = $request->prerequisito;        

        if ($grado->update()) {
            $result = ['successMessage' => 'Grado actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el grado'];
        }

        return redirect()->route('grados.index')->with($result);
    }

    public function destroy(Grado $grado)
    {
        if ($grado->delete()) {
            $result = ['successMessage' => 'Autoridad eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la autoridad'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($grado_id) 
    {                   
        try {
            $grado = Grado::withTrashed()->findOrFail($grado_id);
            $grado->restore();
            $result = ['successMessage' => 'Grado restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el grado'];
            \Log::warning('GradoController@update, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
