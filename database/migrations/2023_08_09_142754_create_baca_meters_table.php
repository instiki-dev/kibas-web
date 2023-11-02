<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBacaMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baca_meters', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekening', 100) -> nullable();
            $table->string('link_foto');
            $table->boolean('verifikasi')->default(false);
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('angka');
            $table->integer('angka_final') -> nullable();
            $table->softDeletes();
            $table->foreign('no_rekening')
                ->references('no_rekening')
                ->on('rekenings')
                ->onDelete('set null');
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
        Schema::dropIfExists('baca_meters');
    }
}
