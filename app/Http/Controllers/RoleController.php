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
        $role = Role::create(['name'=>$request->name]);

        if($request->has('permissions'))
        {
            $permisiosName =Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
            $role->syncPermissions($permisiosName);
        }
        return redirect()->route('roles.index')->with('success', 'ROL CREADO');
    }
    public function edit()
    {
        
    }
    public function destroy($role)
    {
        $role = Role::find($role);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'ROL ELIMINADO');
    }
}
