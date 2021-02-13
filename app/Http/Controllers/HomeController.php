<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $rules = [
            'username' => 'required|string|exists:users',
            'password' => 'required|string'
        ];

        $message = [
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!',
            'username.exists' => 'Username tidak terdaftar!'
        ];

        if($this->validate($request, $rules, $message)) {
            if(Auth::attempt($request->only('username', 'password'))) {
                if(auth()->user()->role == "operator") {
                    return redirect('/dashboard-operator')->with('sukses', 'Selamat, login yang Anda lakukan berhasil!');
                }else {
                    return redirect('/dashboard-admin')->with('sukses', 'Selamat, login yang Anda lakukan berhasil!');
                }
            }else {
                return redirect('/')->with('gagal', 'Username atau Password salah!');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
