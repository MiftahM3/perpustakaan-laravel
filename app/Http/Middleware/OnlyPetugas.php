<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2) {
            return redirect()->back()->with('error', 'Anda Tidak dapat Mengakses !');;
        }
        return $next($request);
    }
}