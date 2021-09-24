<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PensiunMeninggal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensiun_meninggal', function ( Blueprint $table){
            $table->unsignedBigInteger('nip');
            $table->date('bup');
            $table->string('no_sk');
            $table->timestamps();

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
