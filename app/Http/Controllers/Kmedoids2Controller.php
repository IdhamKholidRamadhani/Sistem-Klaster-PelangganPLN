<?php

namespace App\Http\Controllers;

use App\Models\DataRaw;
use Illuminate\Http\Request;

class Kmedoids2Controller extends Controller
{
    public static function median() //Mengurutkan data asc & median
    {
        $data = DataRaw::orderBy('sktm_pelanggan_raw')
            ->orderBy('nama_pelanggan_raw')
            ->orderBy('daya_pelanggan_raw')
            ->orderBy('pekerjaan_pelanggan_raw')
            ->orderBy('penghasilan_pelanggan_raw')
            ->orderby('alamat_pelanggan_raw')
            ->orderby('tanggungan_pelanggan_raw')
            ->get();

        $median = 0; //Median

        if (count($data) % 2 !== 0) {
            $median = (count($data) + 1) / 2; //Ganjil
        } else {
            $median = floor(((count($data) / 2) + ((count($data) / 2) + 1)) / 2); //Genap
        }

        return (object) [
            'medoid1' => (object)[
                'titik1' => $median,        //Medoid1
                'titik2' => $median + 1,    //Medoid2
            ],
            'medoid2' => (object)[
                'titik1' => $median,        //Medoid3
                'titik2' => $median - 1     //Medoid4
            ],
        ];
    }

    public static function kMedoid()
    {
        $data = DataRaw::all();
        $dataConvert = $data->transform(function($item){
            if ($item->sktm_pelanggan_raw === 'Ya') {
                $item->sktm_pelanggan_raw_convert = 1;
            } else {
                $item->sktm_pelanggan_raw_convert = 0;
            }
            return $item;
        });

        $median = Kmedoids2Controller::median();

        dd([
            "data" => $dataConvert,
            "median" => $median
        ]);
    }



    public static function euclidean($data, $medoid)
    {
        //
    }
}
