<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
{
    // Ambil data stok beserta informasi barang terkait
    $stokData = Stok::with('brg')->get(); // Pastikan relasi 'brg' sudah ada di model

    return view('stok.index', compact('stokData')); // Kirim data ke view

}
public function brg()
    {
        return $this->belongsTo(Barang::class, 'brg_id'); // Menghubungkan brg_id dengan id di tabel Barang
    }
}
