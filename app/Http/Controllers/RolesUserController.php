<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesUserController extends Controller
{
    public function edit($user)
    {
        $user = User::find($user);
        $roles = Role::all();
        return view('admin.Usuarios.User-Rol-edit', compact('user', 'roles'));
    }
    public function update(Request $request, $user)
    {
        // $request->validate([
        //     'roles' => 'nullable|exists:roles,id', // 'nullable' permite la opción vacía
        // ]);

        $user = User::find($user);
        // return $request;
        if(empty($request->roles))
        {
            $user->syncRoles([]);
            // return $request;
            return redirect()->route('usuarios.index')->with('success', 'SE HA QUITADO EL ROL');
        }
        else
        {
            $user->syncRoles(Role::find($request->roles));
        }
        return redirect()->route('usuarios.index')->with('success', 'SE HA MODIFICADO EL ROL');
    }
}
