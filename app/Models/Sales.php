<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari plural dari nama model
    protected $table = 'sales';

    // Kolom yang dapat diisi
    protected $fillable = ['nama','notlpn'];

    // Nonaktifkan timestamps jika tidak menggunakan created_at dan updated_at
    public $timestamps = true;
}
