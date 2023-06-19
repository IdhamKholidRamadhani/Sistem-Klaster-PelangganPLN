<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewlogin()
    {
        return view('auth.login');
    }

    public function viewregister()
    {
        return view('auth.register');
    }

    public function sendRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            // 'password_confirmation' => 'min:6'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/Dashboard')->with('success', 'Registration Succesfull!');
    }
}
