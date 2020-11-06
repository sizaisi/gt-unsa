<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;
use Inertia\Inertia;
use App\Http\Requests\GradoRequest;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grados = Grado::latest()->get();

        return Inertia::render('Grados/Index', compact('grados'));
    }

    public function getgrados()
    {
        $grados = Grado::all();

        return $grados;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Grados/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoRequest $request)
    {
        $grado = new Grado();
        $grado->nombre = $request->nombre;
        $grado->nive = $request->nive;
        $grado->codigo = $request->codigo;
        $grado->prerequisito = $request->prerequisito;
        $grado->descripcion = $request->descripcion;

        if ($grado->save()) {
            $result = ['successMessage' => 'Autoridad creada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear la autoridad'];
        }

        return redirect()->route('grados.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        return Inertia::render('Grados/Show', compact('grado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grado $grado)
    {
        return Inertia::render('Grados/Edit', compact('grado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradoRequest $request, Grado $grado)
    {
        $grado->nombre = $request->nombre;
        $grado->nive = $request->nive;
        $grado->codigo = $request->codigo;
        $grado->prerequisito = $request->prerequisito;
        $grado->descripcion = $request->descripcion;

        if ($grado->update()) {
            $result = ['successMessage' => 'Autoridad actualizada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la autoridad'];
        }

        return redirect()->route('grados.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        if ($grado->delete()) {
            $result = ['successMessage' => 'Autoridad eliminada con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar la autoridad'];
        }

        return redirect()->back()->with($result);
    }
}
