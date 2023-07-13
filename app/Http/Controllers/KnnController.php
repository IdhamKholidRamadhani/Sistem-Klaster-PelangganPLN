<?php

namespace App\Http\Controllers;

use App\Models\DataResultCluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;

class KnnController extends Controller
{
    public function viewFormKNN()
    {
        return view('content.hasil_data.form_knn');
    }

    public function knn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_pelanggan_result' => 'required',
            'nama_pelanggan_result' => 'required',
            'tarif_pelanggan_result' => 'required',
            'daya_pelanggan_result' => 'required',
            'alamat_pelanggan_result' => 'required',
            'pekerjaan_pelanggan_result' => 'required',
            'penghasilan_pelanggan_result' => 'required',
            'tanggungan_pelanggan_result' => 'required',
            'sktm_pelanggan_result' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dataKlaster = DataResultCluster::all();

        $dataConvert = $dataKlaster->transform(function ($item) {
            if ($item->sktm_pelanggan_result === 'Ya') {
                $item->sktm_pelanggan_result_convert = 1;
            } else {
                $item->sktm_pelanggan_result_convert = 0;
            }
            return $item;
        });

        $euclidean_distance = [];
        foreach ($dataConvert as $row) {
            array_push($euclidean_distance, [
                'hasil' => sqrt(
                    pow(($request->daya_pelanggan_result - $row->daya_pelanggan_result), 2) +
                        pow(($request->penghasilan_pelanggan_result - $row->penghasilan_pelanggan_result), 2) +
                        pow(($request->tanggungan_pelanggan_result - $row->tanggungan_pelanggan_result), 2) +
                        pow(($request->sktm_pelanggan_result - $row->sktm_pelanggan_result_convert), 2)
                ), 'kategori' => $row->kategori_result
            ]);
        }

        sort($euclidean_distance);
        $distance_data_baru = [];
        $count_data = 0;
        foreach ($euclidean_distance as $eu) {
            if ($count_data < 3) {
                array_push($distance_data_baru, $eu);
                $count_data++;
            }
        }

        $dataSubsidi = [];
        $dataNon = [];
        foreach ($distance_data_baru as $row) {
            if ($row['kategori'] === 'Subsidi') {
                array_push($dataSubsidi, $row);
            } else {
                array_push($dataNon, $row);
            }
        }

        $data = [
            'no_pelanggan_result' => $request->no_pelanggan_result,
            'nama_pelanggan_result' => $request->nama_pelanggan_result,
            'tarif_pelanggan_result' => $request->tarif_pelanggan_result,
            'daya_pelanggan_result' => $request->daya_pelanggan_result,
            'alamat_pelanggan_result' => $request->alamat_pelanggan_result,
            'pekerjaan_pelanggan_result' => $request->pekerjaan_pelanggan_result,
            'penghasilan_pelanggan_result' => $request->penghasilan_pelanggan_result,
            'tanggungan_pelanggan_result' => $request->tanggungan_pelanggan_result,
            'sktm_pelanggan_result' => $request->sktm_pelanggan_result ? "Ya" : "Tidak",
        ];

        if (count($dataSubsidi) > count($dataNon)) {
            $data['kategori_result'] = 'Subsidi';
          } else {
            $data['kategori_result'] = 'Non Subsidi';
          }

        $dataResult = DataResultCluster::create($data);

        if ($dataResult) {
            return redirect('/Data-Result')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return back()->with('error', 'Gagal menambahkan data');
        }
    }
}
