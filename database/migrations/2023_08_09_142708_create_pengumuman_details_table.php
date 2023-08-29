<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumuman_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_id') -> nullable();
            $table->unsignedBigInteger('rekening_id') -> nullable();
            $table->softDeletes();
            $table->foreign('master_id')
                ->references('id')
                ->on('pengumuman_masters')
                ->onDelete('set null');
            $table->foreign('rekening_id')
                ->references('id')
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
        Schema::dropIfExists('pengumuman_details');
    }
}
