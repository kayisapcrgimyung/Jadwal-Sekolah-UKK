<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Cek guard web (Admin)
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin.dashboard');
        }
        
        // Cek guard guru
        if (Auth::guard('guru')->check()) {
            return redirect()->route('guru.dashboard');
        }
        
        // Cek guard siswa
        if (Auth::guard('siswa')->check()) {
            return redirect()->route('siswa.dashboard');
        }

        return $next($request);
    }
}