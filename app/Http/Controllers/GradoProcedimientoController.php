<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradoProcedimiento;
use Inertia\Inertia;
use App\Http\Requests\GradoProcedimientoRequest;

class GradoProcedimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gradosprocedimientos = GradoProcedimiento::latest()->get();

        return Inertia::render('GradosProcedimientos/Index', compact('gradosprocedimientos'));
    }

    public function getgradosprocedimientosorigen()
    {
        $gradosprocedimientos_origen = GradoProcedimiento::all();

        return $gradosprocedimientos_origen;
    }

    public function getgradosprocedimientosdestino()
    {
        $gradosprocedimientos_destino = GradoProcedimiento::all();

        return $gradosprocedimientos_destino;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('GradosProcedimientos/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoProcedimientoRequest $request)
    {
        $gradoprocedimiento = new GradoProcedimiento();
        $gradoprocedimiento->idgradomodalidad = $request->idgradomodalidad;
        $gradoprocedimiento->idprocedimiento = $request->idprocedimiento;
        $gradoprocedimiento->idrol = $request->idrol;
        $gradoprocedimiento->tipo_rol = $request->tipo_rol;
        $gradoprocedimiento->url_formulario = $request->url_formulario;
        $gradoprocedimiento->orden = $request->orden;
        $gradoprocedimiento->descripcion = $request->descripcion;

        if ($gradoprocedimiento->save()) {
            $result = ['successMessage' => 'Grado-Procedimiento creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Grado-Procedimiento'];
        }

        return redirect()->route('gradosprocedimientos.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GradoProcedimiento $gradoprocedimiento)
    {
        return Inertia::render('GradosProcedimientos/Show', compact('gradoprocedimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GradoProcedimiento $gradoprocedimiento)
    {
        return Inertia::render('GradosProcedimientos/Edit', compact('gradoprocedimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradoProcedimientoRequest $request, GradoProcedimiento $gradoprocedimiento)
    {
        $gradoprocedimiento->idgradomodalidad = $request->idgradomodalidad;
        $gradoprocedimiento->idprocedimiento = $request->idprocedimiento;
        $gradoprocedimiento->idrol = $request->idrol;
        $gradoprocedimiento->tipo_rol = $request->tipo_rol;
        $gradoprocedimiento->url_formulario = $request->url_formulario;
        $gradoprocedimiento->orden = $request->orden;
        $gradoprocedimiento->descripcion = $request->descripcion;

        if ($gradoprocedimiento->update()) {
            $result = ['successMessage' => 'Grado-Procedimiento actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el Grado-Procedimiento'];
        }

        return redirect()->route('gradosprocedimientos.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradoProcedimiento $gradoprocedimiento)
    {
        if ($gradoprocedimiento->delete()) {
            $result = ['successMessage' => 'Grado-Procedimeinto eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el Grado-Procedimiento'];
        }

        return redirect()->back()->with($result);
    }
}
