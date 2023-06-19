<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRaw extends Model
{
    use HasFactory;

    protected $table = 'data_raw';
    protected $primary = 'no_pelanggan_raw';
    protected $fillable = [
        'no_pelanggan_raw',
        'nama_pelanggan_raw',
        'tarif_pelanggan_raw',
        'daya_pelanggan_raw',
        'alamat_pelanggan_raw',
        'pekerjaan_pelanggan_raw',
        'penghasilan_pelanggan_raw',
        'tanggungan_pelanggan_raw',
        'sktm_pelanggan_raw',
    ];
}
