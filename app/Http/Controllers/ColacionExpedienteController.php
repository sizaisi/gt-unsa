<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Colacion;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Http\Requests\ColacionExpedienteRequest;


class ColacionExpedienteController extends Controller
{
    public function index()
    {   
        $colaciones = \DB::table('gt_colaciones')->orderBy('id', 'desc')->get();                

        $colaciones = json_decode($colaciones, true);        

        foreach($colaciones as $index=>$colacion) {                        
            $expedientes = \DB::table('gt_expediente')
                        ->where('idcolacion', $colacion['id'])
                        ->orderBy('id', 'desc')->get();

            $colaciones[$index]['array_expediente'] = $expedientes;
        }     
        
        $colaciones = json_encode($colaciones);                    

        return Inertia::render('ColacionesExpedientes/Index', compact('colaciones'));
    }
    
    public function create()
    {
        $colaciones = Colacion::select('id as value','fecha as text')->orderBy('fecha', 'desc')->get();
        $expedientes = \DB::table('gt_expediente')
                        ->where('idcolacion',null)
                        ->orwhere('idcolacion','0')
                        ->orderBy('id', 'desc')->get();

        return Inertia::render('ColacionesExpedientes/Create', compact('colaciones', 'expedientes'));
    }

    public function verexpedientes($idcolacion)
    {
        $expedientes = \DB::table('gt_expediente')
                        ->where('idcolacion',$idcolacion)
                        ->orderBy('id', 'desc')->get();       
        
        return Inertia::render('ColacionesExpedientes/VerExpedientes', compact('expedientes'));
    }
    
    public function edit(ColacionExpediente $colacionexpediente)
    {
        $colaciones = \DB::table('gt_colaciones')->orderBy('id', 'desc')->get();
        $expedientes = \DB::table('gt_expediente')->orderBy('id', 'desc')->get();
        
        return Inertia::render('CargosAutoridades/Edit', compact('colacionexpediente', 'colaciones', 'expedientes'));
    }
    
    public function update(ColacionExpedienteRequest $request, ColacionExpediente $colacionexpediente)
    {
        $colacionexpediente->idcolacion = $request->idcolacion;
        $colacionexpediente->idexpediente = $request->idexpediente;

        if ($colacionexpediente->update()) {
            $result = ['successMessage' => 'Colación - Expediente creado con xito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la Colación - Expediente'];
        }

        return redirect()->route('colacionesexpedientes.index')->with($result);
    }

    public function updateexpedientes(ColacionExpedienteRequest $request)
    {          
        
        $idcolacion = $request->idcolacion;        
        $array_expedientes = $request->idexpediente;

        foreach($array_expedientes as $index=>$valor)
        {           
            \DB::table('gt_expediente')
                ->where('id', '=', $valor)
                ->update(['idcolacion' => $idcolacion]);
        } 

        $result = ['successMessage' => 'Colaciones - Expedientes actualizados con Éxito'];

        return redirect()->route('colacionesexpedientes.index')->with($result);
    }
    
    public function destroy(ColacionExpediente $colacionexpediente)
    {
        if ($colacionexpediente->delete()) {
            $result = ['successMessage' => 'Colación - Expediente desactivado con Ã©xito'];
        } else {
            $result = ['errorMessage' => 'No se pudo desactivar la Colación - Expediente'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($colacionexpediente_id) 
    {                   
        try {
            $colacionexpediente = ColacionExpediente::withTrashed()->findOrFail($colacionexpediente_id);
            $colacionexpediente->restore();
            $result = ['successMessage' => 'Colación - Expediente restaurado con Éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar la Colación - Expediente'];
            \Log::warning('ColacionExpedienteController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}