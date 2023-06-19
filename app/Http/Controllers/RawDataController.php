<?php

namespace App\Http\Controllers;

use App\Datatables\DatatablesController;
use App\Models\DataRaw;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RawDataController extends Controller
{

    public function viewUpload()
    {
        return view('content.upload_data.upload');
    }

    public function uploadFile(Request $request) //Data ke storage
    {
        try {
            $file = $request->file('file');
            //Menghapus all data
            DataRaw::truncate();

            if(Storage::get('/public/fileRaw/data_raw.xlsx')){
                Storage::delete('/public/fileRaw/data_raw.xlsx');
            }
            //Menyimpan data raw ke public storage
            $path = Storage::putFileAs('public/fileRaw', $file, 'data_raw.xlsx');

            //Respon berhasil
            return response()->json(['path' => $path], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Gagal tersimpan di storage'], 200); //Respon gagal
        }
    }

    public function uploadData(Request $request) //Data ke database
    {
        if (DatatablesController::import($request->path)) { //kondisi request file
            //Jika berhasil terupload ke database
            return redirect('/Table-Raw')->withSuccess('Data berhasil tersimpan di database');
        }
        //jika gagal
        return back()->withErrors('Data gagal di import');
    }

    public function datatable()
    {
        return view('content.upload_data.table_raw');
    }

    public function viewData()
    {
        try {
            $data = DataRaw::all();
            $data->transform(function($item){
                $item->nama_pelanggan_raw = strtolower($item->nama_pelanggan_raw);
                $item->alamat_pelanggan_raw = strtolower($item->alamat_pelanggan_raw);

                return $item;
            });
            return DatatablesController::view($data);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
