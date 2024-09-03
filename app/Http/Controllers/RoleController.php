<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function create()
    {

        return view('Roles-Permisos.Role-create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        Role::create(['name' => $validated['name']]);
        return redirect()->route('usuarios.index');
    }
}
