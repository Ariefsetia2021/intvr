<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() {
        $barang = Barang::all(); // Ambil semua data dari tabel 'brg'
        return view('barang.index', compact('barang')); // Kirim data ke view

}
public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|integer',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('masterbarang')->with('success', 'Barang berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('masterbarang')->with('success', 'Barang berhasil dihapus.');
    }

}

