<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('nip_baru')->primary();
            $table->string('nama');
            $table->BigInteger('nip_lama')->nullable();
            $table->string('email')->unique();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('npwp')->nullable();
            $table->enum('status', ['Aktif', 'Pensiun', 'Meninggal', 'Pindah']);
            $table->enum('jns_kelamin', ['L', 'P']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir');
            $table->Integer('kode_agama')->unsigned()->nullable();
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O']);
            $table->enum('sts_marital', ['Menikah', 'Belum menikah']);
            $table->BigInteger('nik');
            $table->string('alamat');
            $table->string('telepon')->nullable();
            $table->Integer('kode_gol')->unsigned()->nullable();
            $table->string('foto');


            $table->foreign('kode_agama')->references('id_agama')->on('tm_agama')
                ->onDelete('cascade');
            $table->foreign('kode_gol')->references('id_gol')->on('tm_gol')
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
