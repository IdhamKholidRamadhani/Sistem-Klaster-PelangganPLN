<?php

namespace App\Imports;

use App\Models\DataRaw;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ExcelImport implements ToModel, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new DataRaw([
            'no_pelanggan_raw' => $row[0],
            'nama_pelanggan_raw' => $row[1],
            'tarif_pelanggan_raw' => $row[2],
            'daya_pelanggan_raw' => $row[3],
            'alamat_pelanggan_raw' => $row[4],
            'pekerjaan_pelanggan_raw' => $row[5],
            'penghasilan_pelanggan_raw' => $row[6],
            'tanggungan_pelanggan_raw' => $row[7],
            'sktm_pelanggan_raw' => $row[8],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
