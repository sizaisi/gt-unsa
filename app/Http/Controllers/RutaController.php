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
                    ->join('gt_procedimientos as P1', 'P1.id', '=', 'R.idproc_origen')
                    ->join('gt_procedimientos as P2', 'P2.id', '=', 'R.idproc_destino')
                    ->join('gt_grados_modalidades', 'gt_grados_modalidades.id', '=', 'R.idgradomodalidad')
                    ->join('gt_grados', 'gt_grados.id', '=', 'gt_grados_modalidades.idgrado')
                    ->join('gt_modalidades', 'gt_modalidades.id', '=', 'gt_grados_modalidades.idmodalidad')
                    ->select('R.*', 'P1.nombre as proc_origen', 'P2.nombre as proc_destino',
                            \DB::raw('CONCAT(gt_grados.nombre, " - ", gt_modalidades.nombre) as grado_modalidad'))
                    ->orderBy('R.id', 'desc')
                    ->get();                      
        
        return Inertia::render('Rutas/Index', compact('rutas'));
    }     
        
    public function create()
    {
        $gradosmodalidades = \DB::table('gt_grados_modalidades')
                                ->join('gt_grados', 'gt_grados.id', '=', 'gt_grados_modalidades.idgrado')
                                ->join('gt_modalidades', 'gt_modalidades.id', '=', 'gt_grados_modalidades.idmodalidad')
                                ->select('gt_grados_modalidades.id as value',
                                        \DB::raw('CONCAT(gt_grados.nombre, " - ", gt_modalidades.nombre) as text'))
                                ->orderBy('gt_grados_modalidades.id', 'desc')
                                ->get();  
        
        $procedimientos = Procedimiento::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();
        
        return Inertia::render('Rutas/Create', compact('gradosmodalidades','procedimientos'));
    }    

    public function store(RutaRequest $request)
    {      
        $ruta = new Ruta();

        $ruta->idgradomodalidad = $request->idgradomodalidad;
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
                    ->join('gt_grados_modalidades', 'gt_grados_modalidades.id', '=', 'R.idgradomodalidad')
                    ->join('gt_grados', 'gt_grados.id', '=', 'gt_grados_modalidades.idgrado')
                    ->join('gt_modalidades', 'gt_modalidades.id', '=', 'gt_grados_modalidades.idmodalidad')
                    ->select('R.*', 'P1.nombre as proc_origen', 'P2.nombre as proc_destino',
                            \DB::raw('CONCAT(gt_grados.nombre, " - ", gt_modalidades.nombre) as grado_modalidad'))
                    ->where('R.id', $ruta->id)
                    ->first();    

        return Inertia::render('Rutas/Show', compact('ruta'));
    }
   
    public function edit(Ruta $ruta)
    {
        $gradosmodalidades = \DB::table('gt_grados_modalidades')
                                ->join('gt_grados', 'gt_grados.id', '=', 'gt_grados_modalidades.idgrado')
                                ->join('gt_modalidades', 'gt_modalidades.id', '=', 'gt_grados_modalidades.idmodalidad')
                                ->select('gt_grados_modalidades.id as value',
                                        \DB::raw('CONCAT(gt_grados.nombre, " - ", gt_modalidades.nombre) as text'))
                                ->orderBy('gt_grados_modalidades.id', 'desc')
                                ->get();  
        
        $procedimientos = Procedimiento::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();


        return Inertia::render('Rutas/Edit', compact('ruta', 'gradosmodalidades', 'procedimientos'));
    }
    
    public function update(RutaRequest $request, Ruta $ruta)
    {
        $ruta->idgradomodalidad = $request->idgradomodalidad;
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
