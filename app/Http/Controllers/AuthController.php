<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'nis'      => 'required|string',
            'password' => 'required|string',
        ], [
            'nis.required' => 'NIS/NIP harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $identifier = $validated['nis'];
        $password   = $validated['password'];

        // === 1) ADMIN ===
        if (Auth::guard('web')->attempt(['nip' => $identifier, 'password' => $password])) {
            $request->session()->regenerate(); // Regenerate setelah login sukses
            return redirect()->route('admin.dashboard')->with('login_success', 'Berhasil masuk sebagai Admin!');
        }

        // === 2) GURU ===
        if (Auth::guard('guru')->attempt(['nip' => $identifier, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->route('guru.dashboard')->with('login_success', 'Berhasil masuk sebagai Guru!');
        }

        // === 3) SISWA ===
        if (Auth::guard('siswa')->attempt(['nis' => $identifier, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->route('siswa.dashboard')->with('login_success', 'Berhasil masuk sebagai Siswa!');
        }

        // === Jika gagal ===
        return back()->withErrors(['login' => 'NIS/NIP atau password yang Anda masukkan salah.'])->withInput();
    }

    public function logout(Request $request)
    {
        // Logout dari semua guard
        foreach (['web', 'guru', 'siswa'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing')->with('logout_success', 'Berhasil logout!');
    }
}