<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customer = Customer::all(); // Ambil semua data dari tabel 'brg'
        return view('customer.index', compact('customer')); // Kirim data ke view
    }
}
