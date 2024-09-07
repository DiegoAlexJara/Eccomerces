<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersControllers extends Controller
{
    public function index()
    {

        $users = User::with('roles')->get();
        return view('admin.Usuarios.Usuarios-index', compact('users'));

        // return $permisos = Permission::all();
        // $users = User::with(['roles', 'permissions'])->get();
        // $roles = Role::all();
        // $permissions = Permission::all();
        // return $users = User::with(['roles', 'permissions'])->get();
        // return view('admin.Usuarios.Usuarios-index', compact('users', 'roles', 'permissions'));
        // return  view('admin.Usuarios.Usuarios-index', compact('users'));
    }
    public function create()
    {
        return view('nuevo-usuario');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => ['required', 'confirmed', Password::defaults()]
        ]);
        $user = User::create($request->all());

        $user->syncRoles('User');
        return redirect()->route('login');
    }
}
