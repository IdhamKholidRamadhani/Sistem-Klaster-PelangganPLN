<?php

namespace App\Http\Controllers;

use App\Datatables\DatatablesController;
use App\Exports\ExcelExport;
use App\Exports\ExcelExportPLN;
use Illuminate\Http\Request;
use App\Http\Controllers\KmedoidsController;
use App\Models\DataResultCluster;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class ResultController extends Controller
{
    public function DataTable_from_dataRaw(Request $request)
    {
        $this->validate($request, [
            'acceptToSaveData' => 'required|string',
        ]);
        if ($request->acceptToSaveData === 'acceptToSaveData') {
            DataResultCluster::truncate();
            $data = KmedoidsController::kMedoid();
            foreach ($data as $d) {
                $save = new DataResultCluster();
                $save->no_pelanggan_result = $d->no_pelanggan_raw;
                $save->nama_pelanggan_result = $d->nama_pelanggan_raw;
                $save->tarif_pelanggan_result = $d->tarif_pelanggan_raw;
                $save->daya_pelanggan_result = $d->daya_pelanggan_raw;
                $save->alamat_pelanggan_result = $d->alamat_pelanggan_raw;
                $save->pekerjaan_pelanggan_result = $d->pekerjaan_pelanggan_raw;
                $save->penghasilan_pelanggan_result = $d->penghasilan_pelanggan_raw;
                $save->tanggungan_pelanggan_result = $d->tanggungan_pelanggan_raw;
                $save->sktm_pelanggan_result = $d->sktm_pelanggan_raw;
                $save->kategori_result = $d->kategori;
                $save->save();
            }
            return redirect('/Data-Result')->withSuccess('Data berhasil tersimpan di database');
        }
    }

    public function viewResult()
    {
        $desa = DataResultCluster::select('alamat_pelanggan_result')->groupBy('alamat_pelanggan_result')->get();
        return view('content.hasil_data.tb_data_result', compact('desa'));
    }

    public static function viewDataResult()
    {
        try {
            $data = [];
            if (request()->has('desa')) {
                $data = DataResultCluster::where('alamat_pelanggan_result', request()->desa)->get();
                $data->transform(function ($item) {
                    $item->no_pelanggan_result = strval($item->no_pelanggan_result);
                    $item->nama_pelanggan_result = strtolower($item->nama_pelanggan_result);
                    $item->alamat_pelanggan_result = strtolower($item->alamat_pelanggan_result);

                    return $item;
                });
            }else{
                $data = DataResultCluster::all()->sortBy('alamat_pelanggan_result')->values();
                $data->transform(function ($item) {
                    $item->no_pelanggan_result = strval($item->no_pelanggan_result);
                    $item->nama_pelanggan_result = strtolower($item->nama_pelanggan_result);
                    $item->alamat_pelanggan_result = strtolower($item->alamat_pelanggan_result);

                    return $item;
                });
            }
            return DatatablesController::view($data);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function exportExcel()
    {
        return Excel::download(new ExcelExport, 'Data-Penduduk-Penerima-Bantuan-Listrik-Subsidi.xlsx');
    }

    public function exportExcelPLN()
    {
        return Excel::download(new ExcelExportPLN, 'Data-Pelanggan-PLN.xlsx');
    }

    public function exportPDF()
    {
        $data = DataResultCluster::where('alamat_pelanggan_result', request()->desa)->get();
<<<<<<< HEAD
        $pdf = PDF::loadView('content.hasil_data.pdf', compact('data'));
        $pdf->add_info('Title', 'Data Penduduk '.request()->desa);
        // return view('content.hasil_data.pdf', compact('data'));
        return $pdf->stream();
=======
        return view('content.hasil_data.pdf', compact('data'));
        // $data = DataResultCluster::get()->sortBy('alamat_pelanggan_result')->values();
        // $pdf = PDF::loadView('content.hasil_data.pdf', compact('data'));
        // $pdf->setOption('enable-local-file-access', true);
        // return $pdf->stream();
>>>>>>> 4fb3762dcee1c01cb5b54c9c32c2ea4e50a6a8f8
    }

    public function exportPDFPLN()
    {
        $data = DataResultCluster::where('alamat_pelanggan_result', request()->desa)->get();
<<<<<<< HEAD
        $pdf = PDF::loadView('content.hasil_data.pdf_pln', compact('data'));
        $pdf->add_info('Title', 'Data Pelanggan '.request()->desa);
        // return view('content.hasil_data.pdf_pln', compact('data'));
        return $pdf->stream();
=======
        return view('content.hasil_data.pdf_pln', compact('data'));
        // $data = DataResultCluster::get()->sortBy('alamat_pelanggan_result')->values();
        // $pdf = PDF::loadView('content.hasil_data.pdf_pln', compact('data'));
        // $pdf->setOption('enable-local-file-access', true);
        // return $pdf->stream();
>>>>>>> 4fb3762dcee1c01cb5b54c9c32c2ea4e50a6a8f8
    }
}
