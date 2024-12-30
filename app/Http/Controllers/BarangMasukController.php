<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Gudang;
use App\Models\BarangMasuk;
use App\Models\Stok;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        $gudang = Gudang::all();

        return view('barang.masuk', compact('barang', 'supplier', 'gudang'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'brg_id' => 'required|exists:brg,id',
        'sply_id' => 'required|exists:sply,id',
        'gudang_id' => 'required|exists:gudang,id',
        'jumlah' => 'required|integer',
        'tanggal_masuk' => 'required|date',
    ]);

    // Simpan ke tabel barangmasuk
    BarangMasuk::create([
        'brg_id' => $request->brg_id,
        'sply_id' => $request->sply_id,
        'gudang_id' => $request->gudang_id,
        'jumlah' => $request->jumlah,
        'tanggal_masuk' => $request->tanggal_masuk,
    ]);

    // Cek apakah produk sudah ada di tabel stok
    $stokData = Stok::where('brg_id', $request->brg_id)
                ->where('gudang_id', $request->gudang_id) // Tambahkan pengecekan gudang_id
                ->first();

    if ($stokData) {
        // Jika produk sudah ada, update jumlah stok
        $stokData->jumlah += $request->jumlah;
        $stokData->save();
    } else {
        // Jika produk belum ada, buat entri stok baru
        Stok::create([
            'brg_id' => $request->brg_id,
            'gudang_id' => $request->gudang_id, // Pastikan gudang_id diisi
            'jumlah' => $request->jumlah,
        ]);
    }

    return redirect()->route('stok')->with('success', 'Data barang masuk berhasil ditambahkan.');


}

}
