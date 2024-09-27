<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosController extends Controller
{
    public function index()
    {
        $permision = Permission::with('roles')->paginate(15);
        return view('admin.Roles-Permisos.Permisos-index', compact('permision'));
    }

    public function show()
    {

        return 'aqui no va';
    }

    public function create()
    {
        $roles = Role::all();
        return view('Roles-Permisos.Permisos-create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:permissions,name',
            'role' => 'required|exists:roles,id',
        ]);
        $permision = Permission::create(['name' => $validated['name']]);
        $role = Role::findById($validated['role']);
        $role->givePermissionTo($permision);
        return redirect()->route('permisos.index')->with('success', 'PERMISO CREADO');
    }

    public function edit($permision)
    {
        $permision = Permission::find($permision);
        $roles = Role::all();
        return view('Roles-Permisos.Permisos-edit', compact('permision', 'roles'));
    }

    public function update(Request $request, $permision)
    {
        if (!$permision = Permission::find($permision)) return abort(404);
        $validated = $request->validate([
            'name' => 'required|string',
            'role' => 'required|exists:roles,id',
        ]);
        $permision->update(['name' => $validated['name']]);
        $role = Role::find($validated['role']);

        if (!$role->hasPermissionTo($permision)) {
            $role->givePermissionTo($permision);
        }
        return redirect()->route('permisos.index')->with('success', 'PERMISO MODIFICADA');
    }

    public function destroy($permision)
    {

        $permision = Permission::find($permision);
        $permision->delete();
        return redirect()->route('permisos.index')->with('success', 'PERMISO ELIMINADO');
    }
}
