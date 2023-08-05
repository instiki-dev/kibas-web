<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan_riwayats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengaduan_id');
            $table->text('keterangan');
            $table->unsignedBigInteger('created_by');
            $table->smallInteger('status');
            $table->timestamps();
            $table->foreign('pengaduan_id')
                ->references('id')
                ->on('pengaduans');
            $table->foreign('created_by')
                ->references('id')
                ->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan_riwayats');
    }
}
