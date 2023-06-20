<?php

namespace App\Http\Controllers;

use App\Datatables\DatatablesController;
use App\Models\DataRaw;
use Exception;
use Illuminate\Http\Request;

class KmedoidsController extends Controller
{
    public static function median() //Mengurutkan data asc & median
    {
        $data = DataRaw::orderBy('sktm_pelanggan_raw')
            ->orderBy('nama_pelanggan_raw')
            // ->orderBy('no_pelanggan_raw')
            ->orderBy('daya_pelanggan_raw')
            ->orderBy('pekerjaan_pelanggan_raw')
            ->orderBy('penghasilan_pelanggan_raw')
            // ->orderby('sktm_pelanggan_raw')
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

    public static function euclidean($data, $medoid)
    {
        //Normalisasi data SKTM
        $dataConvert = $data->transform(function ($item) {
            if ($item->sktm_pelanggan_raw === 'Ya') {
                $item->sktm_pelanggan_raw_convert = 1;
            } else {
                $item->sktm_pelanggan_raw_convert = 0;
            }
            return $item;
        });

        if($medoid['titik1']->sktm_pelanggan_raw === 'Ya'){ //Titik1
            $medoid['titik1']->sktm_pelanggan_raw_convert = 1;
        }else{
            $medoid['titik1']->sktm_pelanggan_raw_convert = 0;
        }

        if($medoid['titik2']->sktm_pelanggan_raw === 'Ya'){ //Titik2
            $medoid['titik2']->sktm_pelanggan_raw_convert = 1;
        }else{
            $medoid['titik2']->sktm_pelanggan_raw_convert = 0;
        }

        // return $dataConvert;

        $jumlah = 0;
        $agtClus1 = [];
        $agtClus2 = [];

        foreach ($dataConvert as $datas) {
            $eu1 = sqrt(
                pow($datas->penghasilan_pelanggan_raw - $medoid['titik1']->penghasilan_pelanggan_raw, 2) +
                    pow($datas->tanggungan_pelanggan_raw - $medoid['titik1']->tanggungan_pelanggan_raw, 2) +
                    pow($datas->daya_pelanggan_raw - $medoid['titik1']->daya_pelanggan_raw, 2) +
                    pow($datas->sktm_pelanggan_raw_convert - $medoid['titik1']->sktm_pelanggan_raw_convert, 2)
            );
            $eu2 = sqrt(
                pow($datas->penghasilan_pelanggan_raw - $medoid['titik2']->penghasilan_pelanggan_raw, 2) +
                    pow($datas->tanggungan_pelanggan_raw - $medoid['titik2']->tanggungan_pelanggan_raw, 2) +
                    pow($datas->daya_pelanggan_raw - $medoid['titik2']->daya_pelanggan_raw, 2) +
                    pow($datas->sktm_pelanggan_raw_convert - $medoid['titik2']->sktm_pelanggan_raw_convert, 2)
            );

            if ($eu1 < $eu2) {
                array_push($agtClus1, ['no_pelanggan_raw' => $datas->no_pelanggan_raw, 'hasil_jarak' => $eu1]);
                $jumlah += $eu1;
            } else {
                array_push($agtClus2, ['no_pelanggan_raw' => $datas->no_pelanggan_raw, 'hasil_jarak' => $eu2]);
                $jumlah += $eu2;
            }
        }

        return (object)[
            'hasil_klaster1' => $agtClus1,
            'hasil_klaster2' => $agtClus2,
            'jumlah' => $jumlah
        ];
    }

    public static function kMedoid() //Rumus Kmedoid
    {
        $data = DataRaw::all(); //Panggil data raw
        $median = KmedoidsController::median();  //Panggil func median
        $medoid_1 = [
            "titik1" => $data[$median->medoid1->titik1],
            "titik2" => $data[$median->medoid1->titik2],
        ]; //Panggil titik median1
        $medoid_2 = [
            "titik1" => $data[$median->medoid2->titik1],
            "titik2" => $data[$median->medoid2->titik2],
        ]; //Panggil titik median2


        $DataSubsidi =  $data->filter(function ($item) {
            return $item->daya_pelanggan_raw == 450;
        });

        $DataCekSubsidi = $data->filter(function ($item) {
            return $item->daya_pelanggan_raw > 450;
        });

        // return response()->json(["data" => $DataSubsidi], 200);

        // dd($DataCekSubsidi);


        $euclidean1 = KmedoidsController::euclidean($DataCekSubsidi, $medoid_1);
        $euclidean2 = KmedoidsController::euclidean($DataCekSubsidi, $medoid_2);

        $simpangan_baku = $euclidean2->jumlah - $euclidean1->jumlah; // S = b-a

        $HasilCekSubsidi = [];
        if ($simpangan_baku > 0) {
            foreach ($euclidean1->hasil_klaster2 as $item) {
                array_push($HasilCekSubsidi, $item['no_pelanggan_raw']);
            }

            foreach($DataSubsidi as $ds){
                array_push($HasilCekSubsidi, $ds->no_pelanggan_raw);
            }

            foreach($data as $d){
                if(in_array($d->no_pelanggan_raw, $HasilCekSubsidi)){
                    $d->nama_pelanggan_raw = strtolower($d->nama_pelanggan_raw);
                    $d->alamat_pelanggan_raw = strtolower($d->alamat_pelanggan_raw);
                    $d->kategori = "Subsidi";
                }else{
                    $d->nama_pelanggan_raw = strtolower($d->nama_pelanggan_raw);
                    $d->alamat_pelanggan_raw = strtolower($d->alamat_pelanggan_raw);
                    $d->kategori = "Non Subsidi";
                }
            }
        }
        return $data;

    }

    public function viewTableKlaster()
    {
        // return response(['test'=>KmedoidsController::kMedoid()],200);
        try {
            return DatatablesController::view(KmedoidsController::kMedoid());
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
        // return response()->json(['data' => ], 200);
    }
}
