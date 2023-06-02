<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonPaskibrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_calon_paskibraka', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->string('name');
            $table->string('alamat');
            $table->string('asal_sekolah');
            $table->string('jenis_kelamin');
            $table->date('tgl_lahir');
            $table->string('no_telp');
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
        Schema::dropIfExists('tb_calon_paskibraka');
    }
}
