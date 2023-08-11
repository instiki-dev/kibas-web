<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekenings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->string('no_rekening', 100);
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('kelurahan_id');
            $table->unsignedBigInteger('area_id') -> nullable();
            $table->string('lat', 100);
            $table->string('lng', 100);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('pelanggan_id')
                ->references('id')
                ->on('pelanggans')
                ->onDelete('cascade');
            $table->foreign('kecamatan_id')
                ->references('id')
                ->on('kecamatans');
            $table->foreign('kelurahan_id')
                ->references('id')
                ->on('kelurahans');
            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
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
        Schema::dropIfExists('rekenings');
    }
}
