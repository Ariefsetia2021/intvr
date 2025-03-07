<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index() {
        $sales = Sales::all(); // Ambil semua data dari tabel 'brg'
        return view('sales.index', compact('sales')); // Kirim data ke view
    }
}
