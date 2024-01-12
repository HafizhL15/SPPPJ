<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('nama_pelanggan');
            $table->string('kode_booking');
            $table->string('nama_barang');
            $table->date('tanggal_masuk');
            $table->string('keterangan');
            $table->string('status');
            $table->string('gambar_barang');
            $table->integer('estimasi');
            $table->integer('biaya');
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('service_barang');
    }
};
