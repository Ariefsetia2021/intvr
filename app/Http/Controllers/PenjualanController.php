<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\KpiDetailPenjualan;
use App\Models\KpiPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{


    public function create()
{
    $customer = Customer::all();
    return view('penjualan.create',compact('customer')); // Pastikan view ini ada
}

    public function store(Request $request)
    {
        // Generate nomor faktur
        $noFaktur = $this->generateFaktur();

        // Simpan data penjualan utama
        $penjualan = new KpiPenjualan();
        $penjualan->pjl_faktur = $noFaktur;
        $penjualan->pjl_cst_id = $request->input('pjl_cst_id');
        $penjualan->pjl_tanggal_penjualan = $request->input('tanggal_penjualan');
        $penjualan->pjl_catatan = $request->input('pjl_catatan');
        $penjualan->pjl_total_harga = 0; // Akan diperbarui nanti
        $penjualan->save();

        $totalHarga = 0;

        // Simpan detail barang yang dijual
        foreach ($request->input('barang') as $barang) {
            $detail = new KpiDetailPenjualan();
            $detail->dtd_pjl_faktur = $noFaktur;
            $detail->dtd_brg_id = $barang['id'];
            $detail->dtd_qty = $barang['qty'];
            $detail->dtd_harga = $barang['harga'];
            $detail->save();

            // Tambahkan ke total harga
            $totalHarga += $barang['qty'] * $barang['harga'];
        }

        // Perbarui total harga di tabel `kpi_penjualan`
        $penjualan->pjl_total_harga = $totalHarga;
        $penjualan->save();

        return redirect()->back()->with('success', 'Penjualan berhasil disimpan dengan No Faktur: ' . $noFaktur);
    }

}
