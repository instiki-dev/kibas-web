<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJudulPenulisLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengumuman_masters', function (Blueprint $table) {
            $table->string('judul')->nullable();
            $table->string('penulis')->nullable();
            $table->string('link_foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengumuman_masters', function (Blueprint $table) {
            //
        });
    }
}
