<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autoridad;
use Inertia\Inertia;
use App\Http\Requests\AutoridadRequest;

class AutoridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autoridades = Autoridad::latest()->get();

        return Inertia::render('Autoridades/Index', compact('autoridades'));
    }

    public function getAutoridades()
    {
        $autoridades = Autoridad::all();

        return $autoridades;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Autoridades/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutoridadRequest $request)
    {
        $autoridad = new Autoridad();
        $autoridad->nombre = $request->nombre;
        $autoridad->grado = $request->grado;

        if ($autoridad->save()) {
            $result = ['successMessage' => 'Autoridad creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la autoridad'];
        }

        return redirect()->route('autoridades.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Autoridad $autoridad)
    {
        return Inertia::render('Autoridades/Show', compact('autoridad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Autoridad $autoridad)
    {
        return Inertia::render('Autoridades/Edit', compact('autoridad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutoridadRequest $request, Autoridad $autoridad)
    {
        $autoridad->nombre = $request->nombre;
        $autoridad->grado = $request->grado;

        if ($autoridad->update()) {
            $result = ['successMessage' => 'Autoridad actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la autoridad'];
        }

        return redirect()->route('autoridades.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoridad $autoridad)
    {
        if ($autoridad->delete()) {
            $result = ['successMessage' => 'Autoridad eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la autoridad'];
        }

        return redirect()->back()->with($result);
    }
}
