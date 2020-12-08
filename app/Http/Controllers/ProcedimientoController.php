<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedimiento;
use Inertia\Inertia;
use App\Http\Requests\ProcedimientoRequest;

class ProcedimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimientos = Procedimiento::latest()->get();

        return Inertia::render('Procedimientos/Index', compact('procedimientos'));
    }

    public function getprocedimientos()
    {
        $procedimientos = Procedimiento::all();

        return $procedimientos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Procedimientos/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcedimientoRequest $request)
    {
        $procedimiento = new Procedimiento();
        $procedimiento->nombre = $request->nombre;

        if ($procedimiento->save()) {
            $result = ['successMessage' => 'Procedimiento creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el procedimiento'];
        }

        return redirect()->route('procedimientos.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Procedimiento $procedimiento)
    {
        return Inertia::render('Procedimientos/Show', compact('procedimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedimiento $procedimiento)
    {
        return Inertia::render('Procedimientos/Edit', compact('procedimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProcedimientoRequest $request, Procedimiento $procedimiento)
    {
        $procedimiento->nombre = $request->nombre;

        if ($procedimiento->update()) {
            $result = ['successMessage' => 'Procedimiento actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar la procedimiento'];
        }

        return redirect()->route('procedimientos.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedimiento $procedimiento)
    {
        if ($procedimiento->delete()) {
            $result = ['successMessage' => 'Procedimiento eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el procedimiento'];
        }

        return redirect()->back()->with($result);
    }
}
