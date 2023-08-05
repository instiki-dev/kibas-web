<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_jawabans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id')->nullable();
            $table->unsignedBigInteger('rekening_id')->nullable();
            $table->unsignedBigInteger('pertanyaan_id')->nullable();
            $table->integer('nilai');
            $table->foreign('pelanggan_id')
                ->references('id')
                ->on('pelanggans')
                ->onDelete('set null');
            $table->foreign('rekening_id')
                ->references('id')
                ->on('rekenings')
                ->onDelete('set null');
            $table->foreign('pertanyaan_id')
                ->references('id')
                ->on('survey_masters')
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
        Schema::dropIfExists('survey_jawabans');
    }
}
