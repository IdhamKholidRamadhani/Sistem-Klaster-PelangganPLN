<?php

namespace App\Datatables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\ExcelImport;
use App\Models\DataRaw;
use DataTables;
use Exception;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class DatatablesController extends Controller
{
    public static function view($data)
    {
         if ($data) {
            return DataTables::of($data)->addIndexColumn()
                ->make(true);

        }
         throw new Exception('gagal menampilkan data');
    }

    public static function import($path)
    {
        if($up = Excel::import(new ExcelImport, $path)){
            return $up;
        }
         throw new Exception('gagal upload data');
    }
}
