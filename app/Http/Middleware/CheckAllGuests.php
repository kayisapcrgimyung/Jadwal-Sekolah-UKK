<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAllGuests
{
	/**
	 * Handle an incoming request.
	 */
	public function handle(Request $request, Closure $next)
	{
		// Jika sudah login sebagai admin (guard 'web')
		if (Auth::guard('web')->check()) {
			return redirect()->route('admin.dashboard');
		}

		// Jika sudah login sebagai guru
		if (Auth::guard('guru')->check()) {
			return redirect()->route('guru.dashboard');
		}

		// Jika sudah login sebagai siswa
		if (Auth::guard('siswa')->check()) {
			return redirect()->route('siswa.dashboard');
		}

		return $next($request);
	}
}
