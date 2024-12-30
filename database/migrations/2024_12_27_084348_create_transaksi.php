<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksi extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('nofaktur', 50)->primary(); // Primary key
            $table->unsignedBigInteger('customer_id'); // Foreign key for customers
            $table->unsignedBigInteger('gudang_id'); // Foreign key for warehouses
            $table->date('tanggal_keluar'); // Date when items are out
            $table->timestamps(); // Created_at and updated_at columns

            // Define foreign key constraints
            $table->foreign('customer_id')
                ->references('id')
                ->on('customer')
                ->onDelete('cascade'); // Cascade delete

            $table->foreign('gudang_id')
                ->references('id')
                ->on('gudang')
                ->onDelete('cascade'); // Cascade delete
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
