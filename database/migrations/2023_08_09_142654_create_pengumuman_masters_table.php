<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumanMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumuman_masters', function (Blueprint $table) {
            $table->id();
            $table->text('pengumuman');
            $table->unsignedBigInteger('area_id') -> nullable();
            $table->unsignedBigInteger('jenis_id') -> nullable();
            $table->softDeletes();
            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onDelete('set null');
            $table->foreign('jenis_id')
                ->references('id')
                ->on('jenis_pengumumen')
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
        Schema::dropIfExists('pengumuman_masters');
    }
}
