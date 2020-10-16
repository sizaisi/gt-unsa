<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use Inertia\Inertia;
use App\Http\Requests\CargoRequest;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::latest()->get();

        return Inertia::render('Cargos/Index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Cargos/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoRequest $request)
    {
        $cargo = new Cargo();
        $cargo->codigo = $request->codigo;
        $cargo->nombre = $request->nombre;

        if ($cargo->save()) {
            $result = ['successMessage' => 'Cargo creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el cargo'];
        }

        return redirect()->route('cargos.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        return Inertia::render('Cargos/Show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return Inertia::render('Cargos/Edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CargoRequest $request, Cargo $cargo)
    {
        $cargo->codigo = $request->codigo;
        $cargo->nombre = $request->nombre;

        if ($cargo->update()) {
            $result = ['successMessage' => 'Cargo actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el cargo'];
        }

        return redirect()->route('cargos.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        if ($cargo->delete()) {
            $result = ['successMessage' => 'Cargo eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el cargo'];
        }

        return redirect()->back()->with($result);
    }
}
