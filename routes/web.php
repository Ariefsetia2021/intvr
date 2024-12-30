<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;

use GuzzleHttp\Promise\Create;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.master');
});

Route::get('/dashboard', function () {
    return view('layout.master');
})->name('dashboard');


Route::get('/customer', [CustomerController::class, 'index'])->name('customer');

Route::get('/stok', [StokController::class, 'index'])->name('stok');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');

Route::get('/gudang', [GudangController::class, 'index'])->name('gudang');

Route::get('/invoice', function () {
    return view('invoice.index');
})->name('invoice');

//ruoter ini adalah proses input data get and post
Route::get('/barangmasuk', [BarangMasukController::class, 'create'])->name('barangmasuk');
Route::post('/barangmasuk', [BarangMasukController::class, 'store'])->name('barangmasuk');


Route::get('/barangkeluar', [BarangKeluarController::class, 'create'])->name('barangkeluar');

Route::post('/barangkeluar', [BarangKeluarController::class, 'store'])->name('barangkeluar');





//ruoter ini adalah proses input data get and post
//Route::get('/barangKeluar',[BarangKeluarController::class,'create'])->name('barangkeluar');
//Route::post('/barangKeluar',[BarangKeluarController::class,'store'])->name('barangkeluar');
//Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
//Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/masterbarang', [BarangController::class, 'index'])->name('masterbarang');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
Route::get('/sales', [SalesController::class, 'index'])->name('sales');


