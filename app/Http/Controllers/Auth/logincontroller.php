<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => 'required|name',
            'password' => 'required|min:6',
        ]);

        $user = \DB::table(table: 'users')->where( 'name', $request->name)->first();
        // Cek input sederhana (belum pakai database)
        $email = $request->email;
        $password = $request->password;

        // Contoh login manual (dummy)
        if ($email === 'admin@gmail.com' && $password === '123456') {
            return redirect()->route('home');
        }

        // Kalau gagal login
        return back()->with('error', 'Email atau password salah!');
    }
}
