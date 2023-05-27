<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPbbTulisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilai_pbb_tulis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('batas_atas');
            $table->bigInteger('batas_bawah');
            $table->bigInteger('bobot');
            $table->string('status');
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
        Schema::dropIfExists('tb_nilai_pbb_tulis');
    }
}
