<?php

namespace App\Http\Controllers;

use App\Datatables\DatatablesController;
use App\Models\DataRaw;
use Exception;
use Illuminate\Http\Request;

class KmedoidsController extends Controller
{
    //Mengurutkan data asc & median
    public static function median()
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

    public static function euclidean($data, $medoid)
    {
        //ubah value data SKTM
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

        $jumlah = 0;
        $agtClus1 = [];
        $agtClus2 = [];

        foreach ($dataConvert as $datas) {
            $eu1 = sqrt(
                pow($medoid['titik1']->penghasilan_pelanggan_raw - $datas->penghasilan_pelanggan_raw, 2) +
                    pow($medoid['titik1']->tanggungan_pelanggan_raw - $datas->tanggungan_pelanggan_raw, 2) +
                    pow($medoid['titik1']->daya_pelanggan_raw - $datas->daya_pelanggan_raw, 2) +
                    pow($medoid['titik1']->sktm_pelanggan_raw_convert - $datas->sktm_pelanggan_raw_convert, 2)
            );
            $eu2 = sqrt(
                pow($medoid['titik2']->penghasilan_pelanggan_raw - $datas->penghasilan_pelanggan_raw, 2) +
                    pow($medoid['titik2']->tanggungan_pelanggan_raw - $datas->tanggungan_pelanggan_raw, 2) +
                    pow($medoid['titik2']->daya_pelanggan_raw - $datas->daya_pelanggan_raw, 2) +
                    pow($medoid['titik2']->sktm_pelanggan_raw_convert - $datas->sktm_pelanggan_raw_convert, 2)
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

        $cek_simpangan_baku = true;
        $i = 0;
        $HasilCekSubsidi = [];
        $DataSubsidi = [];
        while ($cek_simpangan_baku){
            $medoid_1 = [
                "titik1" => $data[$median->medoid1->titik1],
                "titik2" => $data[$median->medoid1->titik2+$i],
            ]; //Panggil titik median1
            $medoid_2 = [
                "titik1" => $data[$median->medoid2->titik1],
                "titik2" => $data[$median->medoid2->titik2-$i],
            ]; //Panggil titik median2

            $euclidean1 = KmedoidsController::euclidean($data, $medoid_1);
            $euclidean2 = KmedoidsController::euclidean($data, $medoid_2);

            $simpangan_baku = $euclidean2->jumlah - $euclidean1->jumlah; // S = b-a

            if ($simpangan_baku > 0) {
                foreach ($euclidean1->hasil_klaster2 as $item) {
                    array_push($HasilCekSubsidi, $item['no_pelanggan_raw']);
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
                $DataSubsidi =  $data->filter(function ($item) {
                    // return $item->daya_pelanggan_raw == 450;
                    if($item->daya_pelanggan_raw == 450){
                        $item->kategori = "Subsidi";
                    }
                    return $item;
                });
                $cek_simpangan_baku = false;
            }else{
                $i =+ 1;
                $cek_simpangan_baku = true;
            }
        }
        return $DataSubsidi;

    }

    public function viewTableKlaster()
    {
        try {
            return DatatablesController::view(KmedoidsController::kMedoid());
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
