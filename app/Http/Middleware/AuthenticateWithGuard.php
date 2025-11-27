<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithGuard
{
    public function handle(Request $request, Closure $next, string $guard): Response
    {
        if (!Auth::guard($guard)->check()) {
            // Redirect ke halaman login sesuai guard
            return match($guard) {
                'web' => redirect()->route('login')->with('error', 'Silakan login sebagai Admin terlebih dahulu'),
                'guru', 'siswa' => redirect()->route('login.user')->with('error', 'Silakan login terlebih dahulu'),
                default => redirect()->route('landing'),
            };
        }

        return $next($request);
    }
}