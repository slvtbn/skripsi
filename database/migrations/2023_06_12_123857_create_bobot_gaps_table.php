<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotGapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bobot_gap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nilai_gap_id');
            $table->decimal('bobot_gap_akademik');
            $table->decimal('bobot_gap_jalan_ditempat');
            $table->decimal('bobot_gap_langkah_tegap');
            $table->decimal('bobot_gap_penghormatan');
            $table->decimal('bobot_gap_belok');
            $table->decimal('bobot_gap_hadap');
            $table->decimal('bobot_gap_lari');
            $table->decimal('bobot_gap_pushup');
            $table->decimal('bobot_gap_situp');
            $table->decimal('bobot_gap_pullup');
            $table->decimal('bobot_gap_tb');
            $table->decimal('bobot_gap_bb');
            $table->decimal('bobot_gap_bentuk_kaki');
            $table->decimal('cf');
            $table->decimal('sf');
            $table->decimal('nilai_akhir');
            $table->timestamps();
        });

        Schema::table('tb_bobot_gap', function (Blueprint $table) {
            $table->foreign('nilai_gap_id')->references('id')->on('tb_nilai_gap')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_bobot_gap');
    }
}
