<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradoModalidad;
use Inertia\Inertia;
use App\Http\Requests\GradoModalidadRequest;

class GradoModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gradosmodalidades = GradoModalidad::latest()->get();

        return Inertia::render('GradosModalidades/Index', compact('gradosmodalidades'));
    }

    public function getgradosmodalidades()
    {
        $gradosmodalidades = GradoModalidad::all();

        return $gradosmodalidades;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('GradosModalidades/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoModalidadRequest $request)
    {
        $gradomodalidad = new GradoModalidad();
        $gradomodalidad->tipo = $request->tipo;
        $gradomodalidad->idgrado = $request->idgrado;
        $gradomodalidad->idmodalidad = $request->idmodalidad;

        if ($gradomodalidad->save()) {
            $result = ['successMessage' => 'Grado-Modalidad creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Grado-Modalidad'];
        }

        return redirect()->route('gradosmodalidades.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GradoModalidad $gradomodalidad)
    {
        return Inertia::render('GradosModalidades/Show', compact('gradomodalidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GradoModalidad $gradomodalidad)
    {
        return Inertia::render('GradosModalidades/Edit', compact('gradomodalidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradoModalidadRequest $request, GradoModalidad $gradomodalidad)
    {
        $gradomodalidad->tipo = $request->tipo;
        $gradomodalidad->idgrado = $request->idgrado;
        $gradomodalidad->idmodalidad = $request->idmodalidad;

        if ($gradomodalidad->update()) {
            $result = ['successMessage' => 'Grado-Modalidad actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el Grado-Modalidad'];
        }

        return redirect()->route('gradosmodalidades.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradoModalidad $gradomodalidad)
    {
        if ($gradomodalidad->delete()) {
            $result = ['successMessage' => 'Grado-Modalidad eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el Grado-Modalidad'];
        }

        return redirect()->back()->with($result);
    }
}
