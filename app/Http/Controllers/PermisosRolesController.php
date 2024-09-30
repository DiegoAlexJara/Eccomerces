<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class PermisosRolesController extends Controller
{
    public function permisos(string $name)
    {
        return view('admin.Roles-Permisos.PermisosRoles', compact('name'));
    }
    public function roles(string $name)
    {
        return view('admin.Roles-Permisos.RolesPermisos', compact('name'));

    }
}
