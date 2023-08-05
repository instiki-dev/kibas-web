<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('rekening_id');
            $table->text('keluhan');
            $table->text('link_foto');
            $table->smallInteger('status');
            $table->unsignedBigInteger('petugas_id') -> nullable();
            $table->text('keterangan_selesai') -> nullable();
            $table->dateTime('tgl_selesai') -> nullable();
            $table->mediumInteger('nilai') -> nullable();
            $table->timestamps();
            $table->foreign('pelanggan_id')
                ->references('id')
                ->on('pelanggans');
            $table->foreign('rekening_id')
                ->references('id')
                ->on('rekenings');
            $table->foreign('petugas_id')
                ->references('id')
                ->on('pegawais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
