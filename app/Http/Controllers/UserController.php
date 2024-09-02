<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function InicioSession(){
        $user = Auth::user();
        // return $user;
        return view('user.index', compact('user'));
    }
}
