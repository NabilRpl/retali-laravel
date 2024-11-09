<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Memastikan tabel agendas belum ada sebelum membuat
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan');
            $table->text('deskripsi');
            $table->string('schedule')->nullable()->index();
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
        // Menghapus tabel saat rollback
        Schema::dropIfExists('agendas'); 
    }
}