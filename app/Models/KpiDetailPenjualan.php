<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiDetailPenjualan extends Model
{
    protected $table = 'kpi_detail_penjualan';

    // Relasi ke tabel penjualan
    public function penjualan()
    {
        return $this->belongsTo(KpiPenjualan::class, 'dtd_pjl_faktur', 'pjl_faktur');
    }
}
