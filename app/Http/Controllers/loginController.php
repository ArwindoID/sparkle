<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Hubungkan dengan model User

class loginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login');
    }

    // Proses login
    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'mahasiswa') {
                return redirect()->route('dashboard')->with('success', 'Login berhasil');
            } else {
                return redirect()->route('dashboard')->with('success', 'Login berhasil');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Email atau password salah.'])->withInput();
        }
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda telah keluar.');
    }
}
