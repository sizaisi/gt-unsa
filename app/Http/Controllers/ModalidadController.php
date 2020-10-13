<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modalidad;
use Inertia\Inertia;
use App\Http\Requests\ModalidadRequest;

class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidades = Modalidad::latest()->get();

        return Inertia::render('Modalidades/Index', compact('modalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Modalidades/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModalidadRequest $request)
    {
        $modalidad = new Modalidad();
        $modalidad->nombre = $request->nombre;

        if ($modalidad->save()) {
            $result = ['successMessage' => 'Modalidad creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la modalidad'];
        }

        return redirect()->route('modalidades.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Modalidad $modalidad)
    {
        return Inertia::render('Modalidades/Show', compact('modalidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Modalidad $modalidad)
    {
        return Inertia::render('Modalidades/Edit', compact('modalidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModalidadRequest $request, Modalidad $modalidad)
    {
        $modalidad->nombre = $request->nombre;

        if ($modalidad->update()) {
            $result = ['successMessage' => 'Modalidad actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la modalidad'];
        }

        return redirect()->route('modalidades.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modalidad $modalidad)
    {
        if ($modalidad->delete()) {
            $result = ['successMessage' => 'Modalidad eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la modalidad'];
        }

        return redirect()->back()->with($result);
    }
}
