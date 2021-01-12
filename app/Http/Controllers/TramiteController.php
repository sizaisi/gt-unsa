<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Tramite;
use App\Http\Requests\TramiteRequest;

class TramiteController extends Controller
{    
    public function index()
    {        
        $tramites = \DB::table('gt_tramites')                                
                            ->select('gt_tramites.*')
                            ->orderBy('id', 'desc')
                            ->get();

        return Inertia::render('Tramites/Index', compact('tramites'));
    }    

    public function create()
    {        
        return Inertia::render('Tramites/Create');
    }

    public function store(TramiteRequest $request)
    {
        $tramite = new Tramite();        
        $tramite->nombre = $request->nombre;
        $tramite->codigo = $request->codigo;
        $tramite->componente = $request->componente;

        if ($tramite->save()) {
            $result = ['successMessage' => 'Trámite creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Trámite'];
        }

        return redirect()->route('tramites.index')->with($result);
    }

    public function show(Tramite $tramite)
    {
        return Inertia::render('Tramites/Show', compact('tramite'));
    }

    public function edit(Tramite $tramite)
    {             
        return Inertia::render('Tramites/Edit', compact('tramite'));
    }

    public function update(TramiteRequest $request, Tramite $tramite)
    {
        $tramite->nombre = $request->nombre;
        $tramite->codigo = $request->codigo;
        $tramite->componente = $request->componente;

        if ($tramite->update()) {
            $result = ['successMessage' => 'Trámite actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el Trámite'];
        }

        return redirect()->route('tramites.index')->with($result);
    }
    
    public function destroy(Tramite $tramite)
    {
        if ($tramite->delete()) {
            $result = ['successMessage' => 'Trámite eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el Trámite'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($tramite_id) 
    {                   
        try {
            $tramite = Tramite::withTrashed()->findOrFail($tramite_id);
            $tramite->restore();
            $result = ['successMessage' => 'Trámite restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el Trámite'];
            \Log::warning('TramiteController@update, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
