<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosController extends Controller
{
    public function index()
    {
        $permision = Permission::with('roles')->get();
        return view('admin.Roles-Permisos.Permisos-index', compact('permision'));
        
    }
    public function show(){
        return 'aqui no va';
    }
    public function create(){
        $roles = Role::all();
        return view('Roles-Permisos.Permisos-create', compact('roles'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|unique:permissions,name',
            'role' => 'required|exists:roles,id',
        ]);
        $permision = Permission::create(['name' => $validated['name']]);
        $role = Role::findById($validated['role']);
        $role->givePermissionTo($permision);
        return redirect()->route('usuarios.index');
    }
}
