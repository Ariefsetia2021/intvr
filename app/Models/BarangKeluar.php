<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'barang_keluar';

    protected $fillable = [
        'nofaktur',        // Gunakan 'no_faktur' sebagai foreign key untuk relasi dengan transaksi
        'barang_id',        // Foreign key untuk relasi dengan barang
        'jumlah',
        'harga_per_satuan',
    ];

    /**
     * Relasi ke model Barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'nama_barang'); // Sesuaikan nama kolom 'barang_id'
    }

    /**
     * Relasi ke model Transaksi
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'nofaktur'); // Sesuaikan dengan 'no_faktur'
    }
}
