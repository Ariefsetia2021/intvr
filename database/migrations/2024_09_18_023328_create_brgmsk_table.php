<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrgMskTable extends Migration
{
    public function up()
    {
        Schema::create('barangmasuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brg_id');
            $table->unsignedBigInteger('sply_id');
            $table->unsignedBigInteger('gudang_id');
            $table->integer('jumlah');
            $table->date('tanggal_masuk');
            $table->timestamps();

            $table->foreign('brg_id')->references('id')->on('brg')->onDelete('cascade');
            $table->foreign('sply_id')->references('id')->on('sply')->onDelete('cascade');
            $table->foreign('gudang_id')->references('id')->on('gudang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barangmasuk');
    }
}

