<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onDelete('cascade');
            $table->foreign('pegawai_id')
                ->references('id')
                ->on('pegawais')
                ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('pegawai_areas');
    }
}
