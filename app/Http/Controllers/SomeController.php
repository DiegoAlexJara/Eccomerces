<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;

class SomeController extends Controller
{
    public function index()
    {
        // Crear roles si no existen
        $roles = ['Admin', 'Editor', 'User'];
        $user = User::find(1);

        foreach ($roles as $roleName) {
            if (!ModelsRole::where('name', $roleName)->exists()) {
                ModelsRole::create(['name' => $roleName]);
            }
        }
        

        // Obtener usuarios o cualquier otra lógica necesaria
        $users = User::with(['roles', 'permissions'])->get();

        // Pasar los datos a la vista
        // return view('users.index', compact('users'));
        // return $user;
        $user = User::find(3);

        if ($user) {
            // Asignar un rol al usuario
            $roleToAssign = 'User'; // El rol que quieres asignar
            
            if ($role = ModelsRole::where('name', $roleToAssign)->first()) {
                $user->assignRole($role);
            } else {
                // Manejo si el rol no existe
                // Puedes crear el rol aquí si es necesario
            }
        }

        // Obtener usuarios o cualquier otra lógica necesaria
        $users = User::with(['roles', 'permissions'])->get();

        // Pasar los datos a la vista
        return $users;
    }
}
