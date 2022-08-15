<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('akun.login');
    }

    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
         ]);
         
        //  dd('berhasil login!');
         
         if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            // dd(auth()->user());
            if (auth()->user()->level == 'admin') {
                return redirect()->intended('dashboard');
            }
            else if (auth()->user()->level == 'pegawai') {
                return redirect()->intended('dashboard');
            }
            return redirect()->intended('/');
         }
         return back()->with('loginError', 'email atau password yang dimasukkan salah');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
