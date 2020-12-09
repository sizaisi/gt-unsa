<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use Inertia\Inertia;
use App\Http\Requests\RutaRequest;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas = Ruta::latest()->get();

        return Inertia::render('Rutas/Index', compact('rutas'));
    }

    public function getAutoridades()
    {
        $autoridades = Autoridad::all();

        return $autoridades;
    }

    public function getRutasByProc() { // obtener rutas salida por cada procedimiento
		$ruta = new Ruta();		
		
		$ruta->setIdGradProcOrigen($_POST['idgradproc_origen']);    

		$result = $ruta->getRutasByIdProcOrigen();

        echo json_encode($result);
        
        return redirect()->route('rutas.index')->with($result);
    }

    public function getListGradModalidad(){
		$grado_modalidad = new GradoModalidad();

		$result = $grado_modalidad->getActives();

		echo json_encode($result);           
    }
    
    public function getListGradProcedimientos(){
		$grado_procedimiento = new GradoProcedimiento();      
		
		$grado_procedimiento->setIdGradoModalidad($_POST['idgrado_modalidad']);      
		
		$result = $grado_procedimiento->getListByIdGradoModalidad();

		echo json_encode($result);       					  
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Rutas/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RutaRequest $request)
    {
        $ruta = new Ruta();
        $ruta->idgradoprocedimiento_origen = $request->idgradoprocedimiento_origen;
        $ruta->idgradoprocedimiento_destino = $request->idgradoprocedimiento_destino;
        $ruta->etiqueta = $request->etiqueta;

        if ($ruta->save()) {
            $result = ['successMessage' => 'Ruta creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la Ruta'];
        }

        return redirect()->route('rutas.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ruta $ruta)
    {
        return Inertia::render('Rutas/Show', compact('ruta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruta $ruta)
    {
        return Inertia::render('Rutas/Edit', compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RutaRequest $request, Ruta $ruta)
    {
        $ruta->idgradoprocedimiento_origen = $request->idgradoprocedimiento_origen;
        $ruta->idgradoprocedimiento_destino = $request->idgradoprocedimiento_destino;
        $ruta->etiqueta = $request->etiqueta;

        if ($ruta->update()) {
            $result = ['successMessage' => 'Ruta actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la Ruta'];
        }

        return redirect()->route('rutas.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruta $ruta)
    {
        if ($ruta->delete()) {
            $result = ['successMessage' => 'Ruta eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la Ruta'];
        }

        return redirect()->back()->with($result);
    }
}
