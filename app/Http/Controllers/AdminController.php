<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function inicio(){
        $user = Auth::user();
        if($user->hasRole('User')) return abort(403, 'FALTA DE PERMISOS ');
        return view('admin.index', compact('user'));
    }
}
