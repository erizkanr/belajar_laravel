<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Menampilkan halaman/form login.
     * Hanya bisa diakses oleh user yang belum login (guest).
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Menampilkan halaman/form login.
     */
    public function showLogin()
    {
        return view('auth.login'); // Lokasi file view: resources/views/auth/login.blade.php
    }

    /**
     * Memproses data dari form login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input dari form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Mencoba untuk melakukan login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate session untuk keamanan

            return redirect()->intended('/'); // Arahkan ke halaman utama jika berhasil
        }

        // 3. Jika login gagal, lemparkan exception validasi
        // Ini akan otomatis mengembalikan user ke halaman sebelumnya dengan pesan error
        throw ValidationException::withMessages([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ]);
    }

    /**
     * Memproses logout pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        $request->session()->invalidate(); // Hapus sesi yang ada

        $request->session()->regenerateToken(); // Buat token CSRF baru

        return redirect('/login'); // Arahkan kembali ke halaman login
    }
}