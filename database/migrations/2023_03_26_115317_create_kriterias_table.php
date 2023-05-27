<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aspek_id');
            $table->string('simbol');
            $table->string('kriteria');
            $table->string('nilai_target');
            $table->string('kelas');
            $table->timestamps();
        });

        Schema::table('tb_kriteria', function (Blueprint $table) {
            $table->foreign('aspek_id')->references('id')->on('tb_aspek')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kriteria');
    }
}
