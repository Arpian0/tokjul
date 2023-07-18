<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data yang diterima dari form register
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru dalam database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Catat pengguna yang baru saja terdaftar
        // Jika Anda ingin langsung masuk setelah registrasi, Anda bisa mengatur session di sini
        // Contoh: auth()->login($user);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login dengan akun yang telah dibuat.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi data yang diterima dari form login
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        // Coba untuk mengotentikasi pengguna
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil, set session dan redirect ke halaman setelah login
            return redirect()->intended('/products');
        } else {
            // Jika gagal, kembali ke halaman login dengan pesan error
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
