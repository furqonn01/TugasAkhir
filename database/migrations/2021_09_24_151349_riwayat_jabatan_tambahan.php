<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatJabatanTambahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_tambahan', function (Blueprint $table) {
            $table->unsignedBigInteger('nip')->unique();
            $table->unsignedInteger('kode_tambahan');
            $table->date('tmt');
            $table->date('kj_berikutnya');
            $table->string('no_sk');
            $table->timestamps();

            $table->foreign('kode_tambahan')->references('id_tambahan')->on('jabatan_tambahan')
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
        //
    }
}
