<?php

namespace Database\Seeders;

use App\Models\NilaiTb;
use Illuminate\Database\Seeder;

class NilaiTbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NilaiTb::create([
            'ba_cowo' => 0,
            'bb_cowo' => 162,
            'ba_cewe' => 0,
            'bb_cewe' => 154,
            'bobot' => 1,
            'status' => 'Tidak Memenuhi Syarat'
        ]);
        NilaiTb::create([
            'ba_cowo' => 163,
            'bb_cowo' => 170,
            'ba_cewe' => 155,
            'bb_cewe' => 160,
            'bobot' => 3,
            'status' => 'Cukup'
        ]);
        NilaiTb::create([
            'ba_cowo' => 171,
            'bb_cowo' => 180,
            'ba_cewe' => 161,
            'bb_cewe' => 175,
            'bobot' => 5,
            'status' => 'Sangat Baik'
        ]);
    }
}
