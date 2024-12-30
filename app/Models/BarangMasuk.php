<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barangmasuk';

    protected $fillable = [
        'brg_id',
        'sply_id',
        'gudang_id',
        'jumlah',
        'tanggal_masuk',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'brg_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'sply_id');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }
}
