<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->string('no_tagihan', 200);
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('rekening_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->unsignedBigInteger('pembaca_id') ->nullable();
            $table->date('tgl_jatuh_tempo');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->foreign('pelanggan_id')
                ->references('id')
                ->on('pelanggans');
            $table->foreign('rekening_id')
                ->references('id')
                ->on('rekenings');
            $table->foreign('pembaca_id')
                ->references('id')
                ->on('pegawais')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihans');
    }
}
