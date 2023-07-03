<?php

namespace App\Http\Controllers;

use App\Models\DataResultCluster;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = DataResultCluster::get();
        return view('content.static.index',compact('data'));
    }

    public function chartData(){
        $label_raw = DataResultCluster::selectRaw('alamat_pelanggan_result')->groupBy('alamat_pelanggan_result')->get();
        $label_result = [];
        foreach($label_raw as $lr){
            array_push($label_result, ucfirst($lr->alamat_pelanggan_result));
        }

        $subsidi_raw = DataResultCluster::where('kategori_result','Subsidi')->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')->groupBy('alamat_pelanggan_result')->get();
        $subsidi_result = [];
        foreach($subsidi_raw as $sr){
            array_push($subsidi_result, $sr->alamat_pelanggan_result);
        }
        $nonsubsidi_raw = DataResultCluster::where('kategori_result','Non Subsidi')->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')->groupBy('alamat_pelanggan_result')->get();
        $nonsubsidi_result = [];
        foreach($nonsubsidi_raw as $nr){
            array_push($nonsubsidi_result, $nr->alamat_pelanggan_result);
        }

        return response()->json([
            'label' => $label_result,
            'subsidi' => $subsidi_result,
            'nonsubsidi' => $nonsubsidi_result
        ]);
    }
}
