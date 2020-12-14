<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Inertia\Inertia;
use App\Http\Requests\RolRequest;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::withTrashed()->latest()->get();

        return Inertia::render('Roles/Index', compact('roles'));
    }   

    public function create()
    {
        return Inertia::render('Roles/Create');
    }

    public function store(RolRequest $request)
    {
        $rol = new Rol();
        $rol->nombre = $request->nombre;

        if ($rol->save()) {
            $result = ['successMessage' => 'Rol creado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo crear el rol'];
        }

        return redirect()->route('roles.index')->with($result);
    }

    public function show(Rol $rol)
    {
        return Inertia::render('Roles/Show', compact('rol'));
    }

    public function edit(Rol $rol)
    {
        return Inertia::render('Roles/Edit', compact('rol'));
    }

    public function update(RolRequest $request, Rol $rol)
    {
        $rol->nombre = $request->nombre;

        if ($rol->update()) {
            $result = ['successMessage' => 'Rol actualizado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo actualizar el rol'];
        }

        return redirect()->route('roles.index')->with($result);
    }

    public function destroy(Rol $rol)
    {
        if ($rol->delete()) {
            $result = ['successMessage' => 'Rol eliminado con éxito'];
        } else {
            $result = ['errorMessage' => 'No se pudo eliminar el rol'];
        }

        return redirect()->back()->with($result);
    }

    public function restore($rol_id) 
    {                   
        try {
            $rol = Rol::withTrashed()->findOrFail($rol_id);
            $rol->restore();
            $result = ['successMessage' => 'Rol restaurado con éxito'];
        }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se pudo restaurar el rol'];
            \Log::warning('RolController@restore, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }        

        return redirect()->back()->with($result);
    }
}
