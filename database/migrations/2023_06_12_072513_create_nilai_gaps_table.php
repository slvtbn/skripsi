<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiGapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilai_gap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bobot_nilai_id');
            $table->bigInteger('gap_akademik');
            $table->bigInteger('gap_jalan_ditempat');
            $table->bigInteger('gap_langkah_tegap');
            $table->bigInteger('gap_penghormatan');
            $table->bigInteger('gap_belok');
            $table->bigInteger('gap_hadap');
            $table->bigInteger('gap_lari');
            $table->bigInteger('gap_pushup');
            $table->bigInteger('gap_situp');
            $table->bigInteger('gap_pullup');
            $table->bigInteger('gap_tb');
            $table->bigInteger('gap_bb');
            $table->bigInteger('gap_bentuk_kaki');
            $table->timestamps();
        });

        Schema::table('tb_nilai_gap', function (Blueprint $table) {
            $table->foreign('bobot_nilai_id')->references('id')->on('tb_bobot_nilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_nilai_gap');
    }
}
