<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataResultCluster extends Model
{
    use HasFactory;
    protected $table = 'data_result_cluster';
    protected $primary = 'no_pelanggan_result';
    protected $fillable = [
        'no_pelanggan_result',
        'nama_pelanggan_result',
        'tarif_pelanggan_result',
        'daya_pelanggan_result',
        'alamat_pelanggan_result',
        'pekerjaan_pelanggan_result',
        'penghasilan_pelanggan_result',
        'tanggungan_pelanggan_result',
        'sktm_pelanggan_result',
        'kategori_result',
    ];
}
