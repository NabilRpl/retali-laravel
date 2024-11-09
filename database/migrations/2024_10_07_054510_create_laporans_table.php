<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id(); // Primary key ID
            $table->string('nama'); // Nama pengguna yang diwajibkan
            $table->string('no_hp')->nullable(); // Nomor telepon opsional
            $table->date('tanggal'); // Tanggal laporan
            $table->string('cloter'); // Informasi cloter
            $table->time('waktu')->nullable(); // Waktu laporan, opsional
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}