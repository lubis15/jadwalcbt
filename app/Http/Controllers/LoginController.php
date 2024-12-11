<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Berita;
use App\Models\Namafas;

class LoginController extends Controller
{
    //
    public function login()
    {
        $judul = 'Login';
     
        if ($user = Auth::user()) {
            return redirect('/dashboard');
        }
        return view('auth.login', [
            'judul' => $judul,
        ]);
    }

    public function proses(Request $request)
    {
        $ceredentials = $request->validate(
            [
                "username" => 'required',
                "password"  => 'required',
            ],
            [
                'username.required' => 'Alamat username wajib diisi',
                'password.required' => 'Kata sandi wajib diisi'
            ]

        );

        if (Auth::attempt($ceredentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return redirect('/dashboard');

            // $request->session()->regenerate();
            // return redirect()->intended('dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Username atau password yang anda masukan salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }

    public function dashboard()
    {
        $judul = 'Dashboard';
        $jumlahJadwal = Jadwal::count();
        $user = Auth::user();
        return view('auth.dashboard', [
            'judul' => $judul,
            'user' => $user,
            'jumlahJadwal' => $jumlahJadwal,
        ]);
    }
}
