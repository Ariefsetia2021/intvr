<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStkTable extends Migration
{
    public function up()
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('id'); // Foreign key untuk referensi ke tabel brg
            $table->bigInteger('gudang_id')->unsigned()->nullable()->change();

            $table->integer('jumlah'); // Jumlah barang
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('id')->references('id')->on('brg')->onDelete('cascade');
              $table->foreign('gudang_id')->references('id')->on('gudang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stok');
    }
}
