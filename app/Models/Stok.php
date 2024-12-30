<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok';
    protected $fillable = ['brg_id', 'jumlah','gudang_id'];
    public function brg()
    {
        return $this->belongsTo(Barang::class, 'brg_id', 'id');
    }
    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id', 'id');
    }
}
