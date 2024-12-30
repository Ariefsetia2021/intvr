<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory; 

    // Tentukan nama tabel jika berbeda dari plural dari nama model
    protected $table = 'gudang';

    // Kolom yang dapat diisi
    protected $fillable = ['nmgd','almtgd','kplgd','nokplgd','nmadmgd','noadmgd'];

    // Nonaktifkan timestamps jika tidak menggunakan created_at dan updated_at
    public $timestamps = true;
}
