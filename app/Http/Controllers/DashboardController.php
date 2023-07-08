<?php

namespace App\Http\Controllers;

use App\Models\DataResultCluster;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = DataResultCluster::get();
        return view('content.static.index', compact('data'));
    }

    public function chartDataDinsos()
    {
        //Label
        $label_raw = DataResultCluster::selectRaw('alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $label_result = [];
        foreach ($label_raw as $lr) {
            array_push($label_result, ucfirst($lr->alamat_pelanggan_result));
        }

        //Data yang akan ditampilkan
        $subsidi_raw = DataResultCluster::where('kategori_result', 'Subsidi')
            ->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $subsidi_result = [];
        foreach ($subsidi_raw as $sr) {
            array_push($subsidi_result, $sr->alamat_pelanggan_result);
        }
        $nonsubsidi_raw = DataResultCluster::where('kategori_result', 'Non Subsidi')
            ->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $nonsubsidi_result = [];
        foreach ($nonsubsidi_raw as $nr) {
            array_push($nonsubsidi_result, $nr->alamat_pelanggan_result);
        }

        return response()->json([
            'label' => $label_result,
            'subsidi' => $subsidi_result,
            'nonsubsidi' => $nonsubsidi_result
        ]);
    }

    public function chartDataPln()
    {
        //Label
        $label_raw = DataResultCluster::selectRaw('alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $label_result = [];
        foreach ($label_raw as $lr) {
            array_push($label_result, ucfirst($lr->alamat_pelanggan_result));
        }

        //Data yang akan ditampilkan
        $data_450 = DataResultCluster::where('daya_pelanggan_result', '450')
            ->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $_450_result = [];
        foreach ($data_450 as $_450) {
            array_push($_450_result, $_450->alamat_pelanggan_result);
        }
        $data_900 = DataResultCluster::where('daya_pelanggan_result', '900')
            ->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $_900_result = [];
        foreach ($data_900 as $_900) {
            array_push($_900_result, $_900->alamat_pelanggan_result);
        }
        $data_900 = DataResultCluster::where('daya_pelanggan_result', '900')
            ->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $_900_result = [];
        foreach ($data_900 as $_900) {
            array_push($_900_result, $_900->alamat_pelanggan_result);
        }
        $data_1300 = DataResultCluster::where('daya_pelanggan_result', '1300')
            ->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $_1300_result = [];
        foreach ($data_1300 as $_1300) {
            array_push($_1300_result, $_1300->alamat_pelanggan_result);
        }
        $data_2200 = DataResultCluster::where('daya_pelanggan_result', '2200')
            ->selectRaw('count(alamat_pelanggan_result) as alamat_pelanggan_result')
            ->groupBy('alamat_pelanggan_result')->get();
        $_2200_result = [];
        foreach ($data_2200 as $_2200) {
            array_push($_2200_result, $_2200->alamat_pelanggan_result);
        }

        return response()->json([
            'label' => $label_result,
            'Data_450' => $_450_result,
            'Data_900' => $_900_result,
            'Data_1300' => $_1300_result,
            'Data_2200' => $_2200_result,
        ]);
    }
}
