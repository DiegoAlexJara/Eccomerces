<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        $user = Auth::user();

        if($user && $user->hasPermissionTo('Asignar roles a usuarios'))return $next($request);
        
        return abort(403, 'NO TIENES LOS PERMISOS NECESARIOS');
    }
}
