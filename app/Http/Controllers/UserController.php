<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return Inertia::render('Usuarios/Index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return Inertia::render('Usuarios/Create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
