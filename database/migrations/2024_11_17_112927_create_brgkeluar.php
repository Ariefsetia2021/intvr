<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluar extends Migration
{
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            $table->string('nofaktur', 50); // Relasi ke transaksi berdasarkan no_faktur
            $table->unsignedBigInteger('barang_id'); // Foreign key untuk barang
            $table->integer('jumlah'); // Jumlah barang keluar
            $table->decimal('harga_per_satuan', 10, 2); // Harga per satuan barang
            $table->timestamps(); // Created_at dan updated_at

            // Define foreign key constraints
            $table->foreign('nofaktur')
                ->references('nofaktur')
                ->on('transaksi')
                ->onDelete('cascade'); // Cascade delete

            $table->foreign('barang_id')
                ->references('id')
                ->on('brg')
                ->onDelete('cascade'); // Cascade delete
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
}
