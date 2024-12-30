<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index() {
        $gudang = Gudang::all(); // Ambil semua data dari tabel 'brg'
        return view('gudang.index', compact('gudang')); // Kirim data ke view
    }
}
