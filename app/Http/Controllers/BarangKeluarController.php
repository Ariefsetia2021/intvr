<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Gudang;
use App\Models\BarangKeluar;
use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class BarangKeluarController extends Controller
{
    public function store(Request $request)
    {
        // Log input data untuk debugging
        Log::info('Request Data:', $request->all());

        // Validasi input
        $request->validate([
            'customer_id' => 'required|exists:customer,id', // Pastikan tabel customers benar
            'gudang_id' => 'required|exists:gudang,id', // Pastikan tabel gudangs benar
            'barang' => 'required|array',
            'barang.*.id' => 'required|exists:brg,id', // Pastikan tabel brg benar
            'barang.*.jumlah' => 'required|integer|min:1', // Minimal 1 unit
            'barang.*.harga' => 'required|numeric|min:0', // Harga minimal 0
            'tanggal_keluar' => 'required|date|date_format:Y-m-d', // Format tanggal valid (contoh: 2024-12-30)
        ]);


        // Generate nomor faktur sebelum transaksi
        $noFaktur = $this->generateNoFaktur();
        Log::info('Generated No Faktur:', ['nofaktur' => $noFaktur]);

        try {
            // Mulai transaksi database
            DB::transaction(function () use ($request, $noFaktur) {
                // Simpan transaksi
                $transaksi = Transaksi::create([
                    'nofaktur' => $noFaktur,
                    'customer_id' => $request->customer_id,
                    'gudang_id' => $request->gudang_id,
                    'tanggal_keluar' => $request->tanggal_keluar,
                ]);
                Log::info('Transaksi Created:', $transaksi->toArray());

                // Loop untuk setiap barang
                foreach ($request->barang as $item) {
                    $stokData = Stok::where('barang_id', $item['id'])
                        ->where('gudang_id', $request->gudang_id)
                        ->first();

                    if (!$stokData || $stokData->jumlah < $item['jumlah']) {
                        throw new Exception('Stok barang tidak mencukupi untuk barang ID: ' . $item['id']);
                    }

                    // Simpan data BarangKeluar
                    BarangKeluar::create([
                        'nofaktur' => $transaksi->nofaktur,
                        'barang_id' => $item['id'],
                        'jumlah' => $item['jumlah'],
                        'harga_per_satuan' => $item['harga'],
                    ]);
                    Log::info('BarangKeluar Created:', ['barang_id' => $item['id']]);

                    // Update stok barang
                    $stokData->jumlah -= $item['jumlah'];
                    $stokData->save();
                    Log::info('Stok Updated:', $stokData->toArray());
                }
            });

            return redirect()->route('stok')->with('success', 'Data barang keluar berhasil ditambahkan.');
        } catch (Exception $e) {
            // Log error jika terjadi masalah
            Log::error('Error menyimpan barang keluar: ' . $e->getMessage(), [
                'request_data' => $request->all(),
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function create()
    {
        // Ambil data barang, gudang, dan customer untuk form
        $barang = Barang::all();
        $gudang = Gudang::all();
        $customer = Customer::all();

        return view('penjualan.create', compact('barang', 'gudang', 'customer'));
    }

    private function generateNoFaktur()
    {
        // Generate nomor faktur dengan format: F-YYYYMMDD-0001
        $lastFaktur = Transaksi::latest('nofaktur')->value('nofaktur');
        $number = $lastFaktur ? (int)substr($lastFaktur, -4) : 0;

        return 'F-' . date('Ymd') . '-' . str_pad($number + 1, 4, '0', STR_PAD_LEFT);
    }
}
