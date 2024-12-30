<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiPenjualan extends Model
{
    protected $table = 'kpi_penjualan';
    protected $primaryKey = 'pjl_faktur';
    public $incrementing = false; // Karena `pjl_faktur` adalah VARCHAR

    // Relasi dengan tabel detail penjualan
    public function details()
    {
        return $this->hasMany(KpiDetailPenjualan::class, 'dtd_pjl_faktur', 'pjl_faktur');
    }
}
