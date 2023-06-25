<?php

namespace App\Http\Controllers;

use App\Models\DataRaw;
use Illuminate\Http\Request;

class Kmedoids2Controller extends Controller
{
    public static function minMax() //Normalisasi data
    {
        $data = DataRaw::all();
        $dataConvert = $data->transform(function ($item) {
            if ($item->sktm_pelanggan_raw === 'Ya') {
                $item->sktm_pelanggan_raw_convert = 1;
            } else {
                $item->sktm_pelanggan_raw_convert = 2;
            }
            return $item;
        });

        $minDaya = $dataConvert->min('daya_pelanggan_raw');
        $minPenghasilan = $dataConvert->min('penghasilan_pelanggan_raw');
        $minTanggungan = $dataConvert->min('tanggungan_pelanggan_raw');
        $minSktm = $dataConvert->min('sktm_pelanggan_raw_convert');

        $maxDaya = $dataConvert->max('daya_pelanggan_raw');
        $maxPenghasilan = $dataConvert->max('penghasilan_pelanggan_raw');
        $maxTanggungan = $dataConvert->max('tanggungan_pelanggan_raw');
        $maxSktm = $dataConvert->max('sktm_pelanggan_raw_convert');

        $minmaxDaya = $maxDaya - $minDaya;
        $minmaxPenghasilan = $maxPenghasilan - $minPenghasilan;
        $minmaxTanggungan = $maxTanggungan - $minTanggungan;
        $minmaxSktm = $maxSktm - $minSktm;


       foreach($dataConvert as $item){
            $item->daya_pelanggan_raw = round((($item->daya_pelanggan_raw-$minDaya)/$minmaxDaya),3);
            $item->penghasilan_pelanggan_raw = round((($item->penghasilan_pelanggan_raw-$minPenghasilan)/$minmaxPenghasilan),3);
            $item->tanggungan_pelanggan_raw = (($item->tanggungan_pelanggan_raw-$minTanggungan)/$minmaxTanggungan);
            $item->sktm_pelanggan_raw_convert = (($item->sktm_pelanggan_raw_convert-$minSktm)/$minmaxSktm);
       }

        return $dataConvert;
    }

    public static function median() //Mengurutkan data asc & median
    {
        $data = Kmedoids2Controller::minMax();
        $dataSort = $data->sortBy('daya_pelanggan_raw')->sortBy('penghasilan_pelanggan_raw')->sortBy('tanggungan_pelanggan_raw')->sortBy('sktm_pelanggan_raw_convert');

        $dataSort = $dataSort->values()->all();
        $median = 0; //Median

        if (count($dataSort) % 2 !== 0) {
            $median = (count($dataSort) + 1) / 2; //Ganjil
        } else {
            $median = floor(((count($dataSort) / 2) + ((count($dataSort) / 2) + 1)) / 2); //Genap
        }

        return [
            'median' => $median,
            'dataSort' => $dataSort,
        ];  //Medoid1 & Medoid
    }

    public static function kMedoid() //fungsi normalisasi data kurang lengkap
    {

        $array = Kmedoids2Controller::median();
        $median = $array['median'];
        $dataSort = $array['dataSort'];
        $data = Kmedoids2Controller::euclidean($dataSort,$median);

        return response()->json(['data' => $data]);
    }

    public static function euclidean($data, $medoid)
    {
        $jumlah1 = 0;
        $jumlah2 = 0;
        $agtClus1 = [];
        $agtClus2 = [];
        $agtClus3 = [];
        $agtClus4 = [];

        foreach ($data as $d) {
            $eu1 = sqrt(
                pow($d->penghasilan_pelanggan_raw - $data[$medoid]->penghasilan_pelanggan_raw, 2) +
                    pow($d->tanggungan_pelanggan_raw - $data[$medoid]->tanggungan_pelanggan_raw, 2) +
                    pow($d->daya_pelanggan_raw - $data[$medoid]->daya_pelanggan_raw, 2) +
                    pow($d->sktm_pelanggan_raw_convert - $data[$medoid]->sktm_pelanggan_raw_convert, 2)
            );
            $eu2 = sqrt(
                pow($d->penghasilan_pelanggan_raw - $data[$medoid + 1]->penghasilan_pelanggan_raw, 2) +
                    pow($d->tanggungan_pelanggan_raw - $data[$medoid + 1]->tanggungan_pelanggan_raw, 2) +
                    pow($d->daya_pelanggan_raw - $data[$medoid + 1]->daya_pelanggan_raw, 2) +
                    pow($d->sktm_pelanggan_raw_convert - $data[$medoid + 1]->sktm_pelanggan_raw_convert, 2)
            );
            $eu3 = sqrt(
                pow($d->penghasilan_pelanggan_raw - $data[$medoid - 1]->penghasilan_pelanggan_raw, 2) +
                    pow($d->tanggungan_pelanggan_raw - $data[$medoid - 1]->tanggungan_pelanggan_raw, 2) +
                    pow($d->daya_pelanggan_raw - $data[$medoid - 1]->daya_pelanggan_raw, 2) +
                    pow($d->sktm_pelanggan_raw_convert - $data[$medoid - 1]->sktm_pelanggan_raw_convert, 2)
            );

            if ($eu1 < $eu2) {
                array_push($agtClus1, ['no_pelanggan_raw' => $d->no_pelanggan_raw, 'hasil_jarak' => round(($eu1),3)]);
                $jumlah1 += $eu1;
            }
            if ($eu2 < $eu1) {
                array_push($agtClus2, ['no_pelanggan_raw' => $d->no_pelanggan_raw, 'hasil_jarak' => round(($eu2),3)]);
                $jumlah1 += $eu2;
            }
            if ($eu3 > $eu1) {
                array_push($agtClus3, ['no_pelanggan_raw' => $d->no_pelanggan_raw, 'hasil_jarak' => round(($eu1),3)]);
                $jumlah2 += $eu1;
            }
            if ($eu3 < $eu1) {
                array_push($agtClus4, ['no_pelanggan_raw' => $d->no_pelanggan_raw, 'hasil_jarak' => round(($eu3),3)]);
                $jumlah2 += $eu3;
            }
        }

        // $simpangan_baku = $jumlah2 - $jumlah1;

        $data = [
            "eu1" => $agtClus1,
            "eu2" => $agtClus2,
            "eu3" => $agtClus3,
            "eu4" => $agtClus4,
            "jumlah1" => $jumlah1,
            "jumlah2" => $jumlah2
        ];

        return $data;
    }
}
