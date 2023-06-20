<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfile(){
        return view('content.static.profile');
    }


}
