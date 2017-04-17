<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('laporan_pemesanan', function (Blueprint $table) {
            $table->increments('idlaporan_pemesanan');
            $table->date('date');//tglsearch
            $table->integer('idpesan');//kodepesan
            $table->string('noso');
            $table->date('tglpesan');
            $table->integer('idbarang');//drpesan
            $table->string('type');
            $table->string('namabarang');
            $table->string('status');
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
        Schema::drop('laporan_pemesanan');
    }
}
