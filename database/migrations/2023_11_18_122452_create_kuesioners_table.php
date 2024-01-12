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
        Schema::create('kuesioners', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('user_id');
            $table->string('nama');
            $table->string('pertanyaan_1');
            $table->string('pertanyaan_2');
            $table->string('pertanyaan_3');
            $table->string('pertanyaan_4');
            $table->string('pertanyaan_5');
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
        Schema::dropIfExists('kuesioners');
    }
};
