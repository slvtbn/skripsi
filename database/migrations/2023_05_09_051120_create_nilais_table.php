<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_paskibraka_id');
            $table->integer('akademik');
            $table->integer('jalan_ditempat');
            $table->integer('langkah_tegap');
            $table->integer('penghormatan');
            $table->integer('belok');
            $table->integer('hadap');
            $table->integer('lari');
            $table->integer('pushup');
            $table->integer('situp');
            $table->integer('pullup');
            $table->integer('tb');
            $table->integer('bb');
            $table->integer('bentuk_kaki');
            $table->timestamps();
        });

        Schema::table('tb_nilai', function (Blueprint $table) {
            $table->foreign('calon_paskibraka_id')->references('id')->on('tb_calon_paskibraka')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_nilai');
    }
}
