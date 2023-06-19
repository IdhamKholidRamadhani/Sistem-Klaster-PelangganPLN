<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KnnController extends Controller
{
    public function viewFormKNN()
    {
        return view('content.hasil_data.form_knn');
    }
}
