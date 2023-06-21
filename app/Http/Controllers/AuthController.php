<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function viewlogin()
    {
        if (Auth::check()) {
            return redirect('/Dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function actionLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('Dashboard');
        }

        return back()->with('error', 'Login Gagal')->onlyInput('email');
    }

    public function actionLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/Login');
    }

    //Registrasi
    public function viewregister()
    {
        if (Auth::check()) {
            return redirect('/Dashboard');
        } else {
            return view('auth.register');
        }
    }

    public function actionRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nama_kantor' => 'required|string',
            'alamat_kantor' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Registrasi Gagal');
        }

        $user = User::create([
            'name' => $request->name,
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor,
            'kontak' => $request->kontak,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('Login')->with('success', 'Registrasi Berhasil.');
        } else {
            return back()->with('error', 'Registrasi Gagal');
        }
    }
}
