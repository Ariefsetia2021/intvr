<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari plural dari nama model
    protected $table = 'brg';

    // Kolom yang dapat diisi
    protected $fillable = ['nama','harga'];

    // Nonaktifkan timestamps jika tidak menggunakan created_at dan updated_at
    public $timestamps = true;

    public function stok()
    {
        return $this->hasMany(Stok::class, 'brg_id'); // Relasi ke stok
    }
}
