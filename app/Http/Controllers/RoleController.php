<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {

        $roles = Role::with('permissions')->paginate(10);
        return view('admin.Roles-Permisos.Rol-index', compact('roles'));
    }
    public function create()
    {
        $permisios = Permission::all();
        return view('Roles-Permisos.Role-create', compact('permisios'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array',
        ]);
        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $permisiosName = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
            $role->syncPermissions($permisiosName);
        }
        return redirect()->route('roles.index')->with('success', 'ROL CREADO');
    }
    public function edit($role)
    {
        $permisios = Permission::all();
        $role = Role::find($role);
        return view('Roles-Permisos.Role-edit', compact('permisios', 'role'));
    }
    public function update(Request $request, $role)
    {
        if (!$role = Role::find($role)) {
            return abort(404);
        }
        

        $validated = $request->validate([
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $role->update(['name' => $validated['name']]);

        $permissions = Permission::whereIn('id', $validated['permissions'])->get();
        if(!$permissions){
            return 'error';
        }

        // Revocar los permisos existentes que no están en la nueva lista
        $role->syncPermissions([]);
        

        // Asignar nuevos permisos
            $role->givePermissionTo($permissions);
        


        return redirect()->route('roles.index')->with('success', 'Roles Actualizados Correctamente.');
    }
    public function destroy($role)
    {
        $role = Role::find($role);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'ROL ELIMINADO');
    }
}
