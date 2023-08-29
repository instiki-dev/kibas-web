<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('no_pelanggan', 100);
            $table->string('nama_pelanggan', 200);
            $table->string('nik_pelanggan', 50);
            $table->text('alamat_pelanggan');
            $table->unsignedBigInteger('kecamatan_id') -> nullable();
            $table->unsignedBigInteger('kelurahan_id') -> nullable();
            $table->unsignedBigInteger('golongan_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('kecamatan_id')
                ->references('id')
                ->on('kecamatans')
                ->onDelete('set null');
            $table->foreign('kelurahan_id')
                ->references('id')
                ->on('kelurahans')
                ->onDelete('set null');
            $table->foreign('golongan_id')
                ->references('id')
                ->on('golongans');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
