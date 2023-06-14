<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bobot_nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nilai_id');
            $table->bigInteger('bobot_akademik');
            $table->bigInteger('bobot_jalan_ditempat');
            $table->bigInteger('bobot_langkah_tegap');
            $table->bigInteger('bobot_penghormatan');
            $table->bigInteger('bobot_belok');
            $table->bigInteger('bobot_hadap');
            $table->bigInteger('bobot_lari');
            $table->bigInteger('bobot_pushup');
            $table->bigInteger('bobot_situp');
            $table->bigInteger('bobot_pullup');
            $table->bigInteger('bobot_tb');
            $table->bigInteger('bobot_bb');
            $table->bigInteger('bobot_bentuk_kaki');
            $table->timestamps();
        });

        Schema::table('tb_bobot_nilai', function (Blueprint $table) {
            $table->foreign('nilai_id')->references('id')->on('tb_nilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_bobot_nilai');
    }
}
