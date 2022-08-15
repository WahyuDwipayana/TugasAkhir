<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    public function index()
    {
        return view('akun.regisadmin');
    }

    public function store(Request $request)
    {
        if($request->password == $request->konfirmasi){
            $request->validate([
                'username'      =>  ['required', 'min:5'],
                'email'         =>  ['required', 'email'],
                'telepon'       =>  ['required', 'numeric', 'min:5'],
                'password'      =>  ['required', 'min:6','max:255'],
                'level'         =>  ['required'],
            ]);

            $pass= Hash::make($request->password);
            $level= 'admin';
            // $request->session()->flash('success', 'Selamat akun anda telah terdaftar!, Silahkan Login');

            // User::create([
            //     'username' => $request->username,
            //     'email' => $request->email,
            //     'no_telp' => $request->telepon,
            //     'password' => $pass,
            //     'level' => $level
            // ]);

            Admin::create([
                'username' => $request->username,
                'email' => $request->email,
                'no_telp' => $request->telepon,
                'password' => $pass,
                'level' => $level
            ]);

            return redirect('login')->with('success', 'Selamat akun anda telah terdaftar!');
        }else{
            return redirect('registerpegawai')->with('gagal', 'Password tidak sesuai');
        }
    }
}