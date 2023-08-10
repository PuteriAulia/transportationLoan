<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authLogin(Request $request){
        $credentials = $request->validate([
            'email'     => ['required','email'],
            'password'  => ['required'],
        ],[
            'email.required'    => 'Username wajib diisi',
            'email.email'       => 'Wajib berformat email',
            'password.required' => 'Password wajib diisi',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Username atau password salah');
        return redirect('/login');
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
