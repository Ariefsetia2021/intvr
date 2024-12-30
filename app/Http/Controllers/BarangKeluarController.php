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
        // Log data input untuk debugging
        Log::info('Request Data:', $request->all());

        $request->validate([
            'customer_id' => 'required|exists:customer,id', // Sesuaikan nama tabel 'customers'
            'gudang_id' => 'required|exists:gudang,id', // Sesuaikan nama tabel 'gudangs'
            'barang' => 'required|array',
            'barang.*.id' => 'required|exists:brg,id',
            'barang.*.jumlah' => 'required|integer|min:1',
            'barang.*.harga' => 'required|numeric|min:0',
            'tanggal_keluar' => 'required|date',
        ]);

        // Panggil generateNoFaktur sebelum transaksi
        $noFaktur = $this->generateNoFaktur();
        Log::info('Generated No Faktur:', ['nofaktur' => $noFaktur]);

        try {
            DB::transaction(function () use ($request, $noFaktur) {
                // Simpan transaksi
                $transaksi = Transaksi::create([
                    'nofaktur' => $noFaktur,
                    'customer_id' => $request->customer_id,
                    'gudang_id' => $request->gudang_id,
                    'tanggal_keluar' => $request->tanggal_keluar,
                ]);
                Log::info('Transaksi Created:', $transaksi->toArray());

                foreach ($request->barang as $item) {
                    $stokData = Stok::where('barang_id', $item['id'])
                        ->where('gudang_id', $request->gudang_id)
                        ->first();

                    if (!$stokData || $stokData->jumlah < $item['jumlah']) {
                        throw new Exception('Stok barang tidak mencukupi untuk barang ID: ' . $item['id']);
                    }

                    BarangKeluar::create([
                        'nofaktur' => $transaksi->nofaktur, // Menggunakan 'no_faktur' sesuai dengan model BarangKeluar
                        'barang_id' => $item['id'],
                        'jumlah' => $item['jumlah'],
                        'harga_per_satuan' => $item['harga'],
                    ]);
                    Log::info('BarangKeluar Created:', ['barang_id' => $item['id']]);

                    // Update stok
                    $stokData->jumlah -= $item['jumlah'];
                    $stokData->save();
                    Log::info('Stok Updated:', $stokData->toArray());
                }
            });

            return redirect()->route('stok')->with('success', 'Data barang keluar berhasil ditambahkan.');
        } catch (Exception $e) {
            Log::error('Error menyimpan barang keluar: ' . $e->getMessage(), [
                'request_data' => $request->all(),
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $barang = Barang::all();
        $gudang = Gudang::all();
        $customer = Customer::all();

        return view('penjualan.create', compact('barang', 'gudang', 'customer'));
    }

    private function generateNoFaktur()
    {
        $lastFaktur = Transaksi::latest('nofaktur')->value('nofaktur');
        $number = $lastFaktur ? (int)substr($lastFaktur, -4) : 0;

        return 'F-' . date('Ymd') . '-' . str_pad($number + 1, 4, '0', STR_PAD_LEFT);
    }
}
