<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramaEstudio;
use Inertia\Inertia;
use App\Http\Requests\ProgramaEstudioRequest;

class ProgramaEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = ProgramaEstudio::latest()->get();

        return Inertia::render('Programas/Index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Programas/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramaEstudioRequest $request)
    {
        $programa = new ProgramaEstudio();
        $programa->nombre = $request->nombre;

        if ($programa->save()) {
            $result = ['successMessage' => 'Programa de Estudio creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el programa de estudio'];
        }

        return redirect()->route('programas.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramaEstudio $programa)
    {
        return Inertia::render('Programas/Show', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramaEstudio $programa)
    {
        return Inertia::render('Programas/Edit', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramaEstudioRequest $request, ProgramaEstudio $programa)
    {
        $programa->nombre = $request->nombre;

        if ($programa->update()) {
            $result = ['successMessage' => 'Programa de Estudio actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el programa de estudio'];
        }

        return redirect()->route('programas.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramaEstudio $programa)
    {
        if ($programa->delete()) {
            $result = ['successMessage' => 'Programa de Estudio eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el programa de estudio'];
        }

        return redirect()->back()->with($result);
    }
}
