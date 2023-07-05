<?php

namespace App\Http\Controllers;

use App\Models\DataResultCluster;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('landing_page.index');
    }

    public function search(Request $request)
    {
        $data = "";
        if(!is_null($request->cari)){
            if( $data = DataResultCluster::where('no_pelanggan_result','LIKE', $request->cari)?->first()){
                return response()->json(['data' => $data]);
            }
            return response()->json(['data' => 'Data yang diinputkan tidak ditemukan.']);
        }
        return response()->json(['data' => 'Tidak ada data yang ditemukan.']);
    }
}
