<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Grado;
use App\Models\Modalidad;
use Illuminate\Http\Request;
use App\Models\GradoModalidad;
use App\Http\Requests\GradoModalidadRequest;

class GradoModalidadController extends Controller
{    
    public function index()
    {        
        $gradosmodalidades = \DB::table('gt_grados_modalidades')
                                ->join('gt_grados', 'gt_grados.id', '=', 'gt_grados_modalidades.idgrado')
                                ->join('gt_modalidades', 'gt_modalidades.id', '=', 'gt_grados_modalidades.idmodalidad')
                                ->select('gt_grados_modalidades.*', 'gt_grados.nombre as grado', 'gt_modalidades.nombre as modalidad')
                                ->orderBy('gt_grados_modalidades.id', 'desc')
                                ->get();

        return Inertia::render('GradosModalidades/Index', compact('gradosmodalidades'));
    }    

    public function create()
    {
        $grados = Grado::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();
        $modalidades = Modalidad::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();

        return Inertia::render('GradosModalidades/Create', compact('grados', 'modalidades'));
    }

    public function store(GradoModalidadRequest $request)
    {
        $gradomodalidad = new GradoModalidad();        
        $gradomodalidad->idgrado = $request->idgrado;
        $gradomodalidad->idmodalidad = $request->idmodalidad;

        if ($gradomodalidad->save()) {
            $result = ['successMessage' => 'Grado-Modalidad creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Grado-Modalidad'];
        }

        return redirect()->route('gradosmodalidades.index')->with($result);
    }

    public function show(GradoModalidad $gradomodalidad)
    {
        $gradomodalidad = \DB::table('gt_grados_modalidades')
                                ->join('gt_grados', 'gt_grados.id', '=', 'gt_grados_modalidades.idgrado')
                                ->join('gt_modalidades', 'gt_modalidades.id', '=', 'gt_grados_modalidades.idmodalidad')
                                ->select('gt_grados_modalidades.*', 'gt_grados.nombre as grado', 'gt_modalidades.nombre as modalidad')
                                ->where('gt_grados_modalidades.id', $gradomodalidad->id)                                
                                ->first();                

        return Inertia::render('GradosModalidades/Show', compact('gradomodalidad'));
    }

    public function edit(GradoModalidad $gradomodalidad)
    {
        $grados = Grado::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();
        $modalidades = Modalidad::select('id as value','nombre as text')->orderBy('nombre', 'asc')->get();
        
        return Inertia::render('GradosModalidades/Edit', compact('gradomodalidad', 'grados', 'modalidades'));
    }

    public function update(GradoModalidadRequest $request, GradoModalidad $gradomodalidad)
    {
        $gradomodalidad->idgrado = $request->idgrado;
        $gradomodalidad->idmodalidad = $request->idmodalidad;

        if ($gradomodalidad->update()) {
            $result = ['successMessage' => 'Grado-Modalidad actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el Grado-Modalidad'];
        }

        return redirect()->route('gradosmodalidades.index')->with($result);
    }
    
    public function destroy(GradoModalidad $gradomodalidad)
    {
        if ($gradomodalidad->delete()) {
            $result = ['successMessage' => 'Grado-Modalidad eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el Grado-Modalidad'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($gradomodalidad_id) 
    {                   
        try {
            $gradomodalidad = GradoModalidad::withTrashed()->findOrFail($gradomodalidad_id);
            $gradomodalidad->restore();
            $result = ['successMessage' => 'Grado-Modalidad restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el Grado-Modalidad'];
            \Log::warning('GradoModalidadController@update, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
