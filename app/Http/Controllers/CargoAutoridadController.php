<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargoAutoridad;
use Inertia\Inertia;
use App\Http\Requests\CargoAutoridadRequest;

class CargoAutoridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargosautoridades = CargoAutoridad::latest()->get();

        return Inertia::render('CargosAutoridades/Index', compact('cargosautoridades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('CargosAutoridades/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoAutoridadRequest $request)
    {
        $cargoautoridad = new CargoAutoridad();
        $cargoautoridad->idcargo = $request->idcargo;
        $cargoautoridad->idautoridad = $request->idautoridad;
        $cargoautoridad->fecha_inicio = $request->fecha_inicio;
        $cargoautoridad->fecha_fin = $request->fecha_fin;

        if ($cargoautoridad->save()) {
            $result = ['successMessage' => 'Cargo-Autoridad creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Cargo-Autoridad'];
        }

        return redirect()->route('cargosautoridades.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CargoAutoridad $cargoautoridad)
    {
        return Inertia::render('CargosAutoridades/Show', compact('cargoautoridad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CargoAutoridad $cargoautoridad)
    {
        return Inertia::render('CargosAutoridades/Edit', compact('cargoautoridad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CargoAutoridadRequest $request, CargoAutoridad $cargoautoridad)
    {
        $cargoautoridad->idcargo = $request->idcargo;
        $cargoautoridad->idautoridad = $request->idautoridad;
        $cargoautoridad->fecha_inicio = $request->fecha_inicio;
        $cargoautoridad->fecha_fin = $request->fecha_fin;

        if ($cargoautoridad->update()) {
            $result = ['successMessage' => 'Cargo-Autoridad creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Cargo-Autoridad'];
        }

        return redirect()->route('cargosautoridades.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CargoAutoridad $cargoautoridad)
    {
        if ($cargoautoridad->delete()) {
            $result = ['successMessage' => 'Cargo-Autoridad creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el Cargo-Autoridad'];
        }

        return redirect()->back()->with($result);
    }
}
