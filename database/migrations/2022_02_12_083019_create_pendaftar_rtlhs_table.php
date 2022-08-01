<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarRtlhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_rtlhs', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk')->unique();
            $table->string('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->bigInteger('kelurahan_id');
            $table->string('status');
            $table->string('tahun_anggaran');
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
        Schema::dropIfExists('pendaftar_rtlhs');
    }
}
