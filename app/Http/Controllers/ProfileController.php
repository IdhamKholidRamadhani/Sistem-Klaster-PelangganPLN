<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $profil = Auth::user()->id;
        $data = User::where('id',$profil)->get();
        return view('content.static.profile',compact('data'));
    }

    public function updateProfile(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string',
        //     'nama_kantor' => 'required|string',
        //     'alamat_kantor' => 'required|string',
        //     'kontak' => 'required|string',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed|string',
        // ]);

        // if ($request->fails()) {
        //     return back()->with('error', 'Update Gagal');
        // }

        $data = [
            'name' => $request->name,
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor,
            'kontak' => $request->kontak,
            'email' => $request->email,
        ];

        if(isset($request->password)){
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $request->id)
            ->update($data);

        return redirect('/Profile')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
