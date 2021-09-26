<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatStruktural extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_struktural', function (Blueprint $table) {
            $table->unsignedBigInteger('nip')->unique();
            $table->unsignedInteger('kode_struktural');
            $table->date('tmt');
            $table->date('kj_berikutnya');
            $table->string('no_sk');
            $table->timestamps();

            $table->foreign('kode_struktural')->references('id_struktural')->on('jabatan_struktural')
                ->onDelete('cascade');
            $table->foreign('nip')->references('nip_baru')->on('pegawai')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_struktural');
    }
}
