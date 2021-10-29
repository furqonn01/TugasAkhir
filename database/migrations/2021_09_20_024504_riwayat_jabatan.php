<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_jabatan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('nip');
            $table->unsignedInteger('kode_jabatan');
            $table->date('tmt');
            $table->date('kj_berikutnya');
            $table->string('no_sk');
            $table->string('file_sk');
            $table->timestamps();

            $table->foreign('kode_jabatan')->references('id_jabatan')->on('jabatan_fungsional')
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
        Schema::dropIfExists('riwayat_jabatan');
    }
}
