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
        // $cari = $request->cari;
        // $data = DataResultCluster::where('no_pelanggan_result','LIKE','%'.$cari.'%')->get();
        // $search = array_values(array_filter((array)$data, function ($item) use ($cari) {
        //     return $item->no_pelanggan_result === $cari;
        // }));
        // return response()->json(['data' => $search], 200);
    }
}
