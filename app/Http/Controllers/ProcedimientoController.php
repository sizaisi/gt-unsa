<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Procedimiento;
use App\Http\Requests\ProcedimientoRequest;

class ProcedimientoController extends Controller
{    
    public function index()
    {
        $procedimientos = \DB::table('gt_procedimientos')
                                ->join('gt_tramites', 'gt_tramites.id', '=', 'gt_procedimientos.idtramite')
                                ->join('gt_roles', 'gt_roles.id', '=', 'gt_procedimientos.idrol')                                
                                ->select('gt_procedimientos.*', 'gt_roles.nombre as rol', 'gt_tramites.nombre as tramite')                                        
                                ->orderBy('gt_procedimientos.id', 'desc')
                                ->get();       
        
        return Inertia::render('Procedimientos/Index', compact('procedimientos'));
    }        

    public function create()
    {
        $tramites = \DB::table('gt_tramites')                                
                        ->select('id as value', 'nombre as text')                                        
                        ->orderBy('nombre', 'asc')
                        ->get();      
        
        $roles = Rol::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();

        return Inertia::render('Procedimientos/Create', compact('tramites', 'roles'));
    }
    
    public function store(ProcedimientoRequest $request)
    {                  
        $procedimiento = new Procedimiento();

        $procedimiento->nombre = $request->nombre;
        $procedimiento->idtramite = $request->idtramite;        
        $procedimiento->idrol = $request->idrol;
        $procedimiento->tipo_rol = $request->tipo_rol;
        $procedimiento->componente = $request->componente;
        $procedimiento->orden = $request->orden;
        $procedimiento->descripcion = $request->descripcion;

        if ($procedimiento->save()) {
            $result = ['successMessage' => 'Procedimiento creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Procedimiento'];
        }

        return redirect()->route('procedimientos.index')->with($result);
    }
    
    public function show(Procedimiento $procedimiento)
    {
        $procedimiento = \DB::table('gt_procedimientos')
                                ->join('gt_tramites', 'gt_tramites.id', '=', 'gt_procedimientos.idtramite')
                                ->join('gt_roles', 'gt_roles.id', '=', 'gt_procedimientos.idrol')                                
                                ->select('gt_procedimientos.*', 'gt_roles.nombre as rol', 'gt_tramites.nombre as tramite')
                                ->where('gt_procedimientos.id', $procedimiento->id)
                                ->first();       

        return Inertia::render('Procedimientos/Show', compact('procedimiento'));
    }

    public function edit(Procedimiento $procedimiento)
    {
        $tramites = \DB::table('gt_tramites')                                
                        ->select('id as value', 'nombre as text')                                        
                        ->orderBy('nombre', 'asc')
                        ->get();      
        
        $roles = Rol::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();
        
        return Inertia::render('Procedimientos/Edit', compact('procedimiento', 'tramites', 'roles'));
    }
    
    public function update(ProcedimientoRequest $request, Procedimiento $procedimiento)
    {
        $procedimiento->nombre = $request->nombre;
        $procedimiento->idtramite = $request->idtramite;        
        $procedimiento->idrol = $request->idrol;
        $procedimiento->tipo_rol = $request->tipo_rol;
        $procedimiento->componente = $request->componente;
        $procedimiento->orden = $request->orden;
        $procedimiento->descripcion = $request->descripcion;

        if ($procedimiento->update()) {
            $result = ['successMessage' => 'Procedimiento actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el Procedimiento'];
        }

        return redirect()->route('procedimientos.index')->with($result);
    }

    public function destroy(Procedimiento $procedimiento)
    {
        if ($procedimiento->delete()) {
            $result = ['successMessage' => 'Procedimeinto eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el Procedimiento'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($procedimiento_id) 
    {                   
        try {
            $procedimiento = Procedimiento::withTrashed()->findOrFail($procedimiento_id);
            $procedimiento->restore();
            $result = ['successMessage' => 'Procedimiento restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el Procedimiento'];
            \Log::warning('ProcedimientoController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());
        }        

        return redirect()->back()->with($result);
    }
}
