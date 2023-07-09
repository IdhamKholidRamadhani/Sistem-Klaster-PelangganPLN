<?php

namespace App\Exports;

use App\Models\DataResultCluster;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelExportPLN implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataResultCluster::select(
            'no_pelanggan_result',
            'nama_pelanggan_result',
            'tarif_pelanggan_result',
            'daya_pelanggan_result',
            'alamat_pelanggan_result',
            'kategori_result',
        )
        ->orderBy('alamat_pelanggan_result')
        ->get();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $cellRange = 'A1:W1'; //semua header
                $event->sheet->getDelegate()->getStyle($cellRange)
                ->getFont()->setSize(12);
            },
        ];
    }

    public function headings(): array
    {
        return [
            "No_Pelanggan",
            "Nama",
            "Jenis Tarif",
            "Daya Listrik",
            "Alamat",
            "Kategori",
        ];
    }
}
