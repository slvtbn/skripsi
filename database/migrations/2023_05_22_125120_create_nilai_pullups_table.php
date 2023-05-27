<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPullupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nilai_pullup', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ba_cowo');
            $table->bigInteger('bb_cowo');
            $table->bigInteger('ba_cewe');
            $table->bigInteger('bb_cewe');
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
        Schema::dropIfExists('tb_nilai_pullup');
    }
}
