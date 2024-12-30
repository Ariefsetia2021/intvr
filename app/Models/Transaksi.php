<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Tentukan primary key
    protected $primaryKey = 'nofaktur';

    // Set tipe data untuk primary key (karena no_faktur adalah string, bukan integer)
    protected $keyType = 'string';

    // Menonaktifkan auto-increment karena primary key bukan integer
    public $incrementing = false;

    // Tentukan tabel yang digunakan
    protected $table = 'transaksi';

    protected $fillable = [
        'nofaktur',
        'customer_id',
        'gudang_id',
        'tanggal_keluar',
    ];

    /**
     * Relasi ke model Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Relasi ke model Gudang
     */
    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }
}
