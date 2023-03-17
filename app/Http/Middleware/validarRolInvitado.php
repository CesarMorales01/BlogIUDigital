<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class validarRolInvitado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        if(auth()->user()->rol->clave!='invitado'){
            return $next($request);
        }
       // $user=auth()->user()->rol;
       // return response()->json($user, 200, []);
        return redirect('/');
    }
}
