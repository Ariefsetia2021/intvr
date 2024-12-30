<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudang', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('nmgd');
            $table->string('almtgd');
            $table->string('kplgd');
            $table->unsignedBigInteger('nokplgd', 15);
            $table->string('nmadmgd');
            $table->unsignedBigInteger('noadmgd', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudang');
    }
}
