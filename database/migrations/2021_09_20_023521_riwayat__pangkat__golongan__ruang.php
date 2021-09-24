<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatPangkatGolonganRuang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Riwayat_Pangkat_Golongan_Ruang', function (Blueprint $table) {
            $table->unsignedBigInteger('nip');
            $table->unsignedInteger('kode_gol');
            $table->date('tmt');
            $table->date('kp_berikutnya');
            $table->timestamps();

            $table->foreign('kode_gol')->references('id_gol')->on('tm_gol')
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
        Schema::dropIfExists('Riwayat_Pangkat_Golongan_Ruang');
    }
}
