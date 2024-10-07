<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function inicio(){
        $user = Auth::user();
        if($user->hasRole('User')) return abort(403, 'FALTA DE PERMISOS ');
        $comments = comments::all();
        return view('admin.index', compact('user', 'comments'));
    }
}
