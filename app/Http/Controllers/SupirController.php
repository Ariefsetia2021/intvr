<?php

namespace App\Http\Controllers;
use app\Models\Supir;

use Illuminate\Http\Request;

class SupirController extends Controller
{

    public function index() {
        $supir = Supir::all(); // Ambil semua data dari tabel 'brg'
        return view('supir.index', compact('supir')); // Kirim data ke view
    }
}
