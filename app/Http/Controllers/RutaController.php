<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Ruta;
use Illuminate\Http\Request;
use App\Models\Procedimiento;
use App\Http\Requests\RutaRequest;

class RutaController extends Controller
{    
    public function index()
    {
        $rutas = \DB::table('gt_rutas as R')
                    ->leftJoin('gt_procedimientos as P1', 'P1.id', '=', 'R.idproc_origen')
                    ->leftJoin('gt_procedimientos as P2', 'P2.id', '=', 'R.idproc_destino')
                    ->leftJoin('gt_tramites', 'gt_tramites.id', '=', 'R.idtramite')                    
                    ->select('R.*', 'P1.nombre as proc_origen', 'P2.nombre as proc_destino', 'gt_tramites.nombre as tramite')                            
                    ->orderBy('R.id', 'desc')
                    ->get();                      
        
        return Inertia::render('Rutas/Index', compact('rutas'));
    }     

    public function getProcedimientos($idtramite)
    {       
        $procedimientos = Procedimiento::select('id as value','nombre as text')
                                        ->where('idtramite', $idtramite)
                                        ->orderBy('nombre', 'asc')->get();      
        return $procedimientos;
    }    
        
    public function create()
    {
        $tramites = \DB::table('gt_tramites')                                
                        ->select('id as value', 'nombre as text')                                        
                        ->orderBy('nombre', 'asc')
                        ->get();      
                
        return Inertia::render('Rutas/Create', compact('tramites'));
    }    

    public function store(RutaRequest $request)
    {      
        $ruta = new Ruta();

        $ruta->idtramite = $request->idtramite;
        $ruta->idproc_origen = $request->idproc_origen;
        $ruta->idproc_destino = $request->idproc_destino;
        $ruta->etiqueta = $request->etiqueta;

        if ($ruta->save()) {
            $result = ['successMessage' => 'Ruta creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la Ruta'];
        }

        return redirect()->route('rutas.index')->with($result);
    }
    
    public function show(Ruta $ruta)
    {
        $ruta = \DB::table('gt_rutas as R')
                    ->join('gt_procedimientos as P1', 'P1.id', '=', 'R.idproc_origen')
                    ->join('gt_procedimientos as P2', 'P2.id', '=', 'R.idproc_destino')
                    ->join('gt_tramites', 'gt_tramites.id', '=', 'R.idtramite')                    
                    ->select('R.*', 'P1.nombre as proc_origen', 'P2.nombre as proc_destino', 'gt_tramites.nombre as tramite')
                    ->where('R.id', $ruta->id)
                    ->first();    

        return Inertia::render('Rutas/Show', compact('ruta'));
    }
   
    public function edit(Ruta $ruta)
    {
        $tramites = \DB::table('gt_tramites')                                
                        ->select('id as value', 'nombre as text')                                        
                        ->orderBy('nombre', 'asc')
                        ->get();      
        
        return Inertia::render('Rutas/Edit', compact('ruta', 'tramites'));
    }
    
    public function update(RutaRequest $request, Ruta $ruta)
    {
        $ruta->idtramite = $request->idtramite;
        $ruta->idproc_origen = $request->idproc_origen;
        $ruta->idproc_destino = $request->idproc_destino;
        $ruta->etiqueta = $request->etiqueta;

        if ($ruta->update()) {
            $result = ['successMessage' => 'Ruta actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la Ruta'];
        }

        return redirect()->route('rutas.index')->with($result);
    }
    
    public function destroy(Ruta $ruta)
    {
        if ($ruta->delete()) {
            $result = ['successMessage' => 'Ruta eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la Ruta'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($ruta_id) 
    {                   
        try {
            $ruta = Ruta::withTrashed()->findOrFail($ruta_id);
            $ruta->restore();
            $result = ['successMessage' => 'Ruta restaurada con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar la ruta'];
            \Log::warning('RutaController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
