<?php

namespace Database\Seeders;

use App\Models\NilaiPullup;
use Illuminate\Database\Seeder;

class NilaiPullupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NilaiPullup::create([
            'ba_cowo' => 1,
            'bb_cowo' => 4,
            'ba_cewe' => 1,
            'bb_cewe' => 15,
            'bobot' => 1,
            'status' => 'Tidak Memenuhi Syarat'
        ]);
        NilaiPullup::create([
            'ba_cowo' => 5,
            'bb_cowo' => 8,
            'ba_cewe' => 16,
            'bb_cewe' => 30,
            'bobot' => 2,
            'status' => 'Kurang'
        ]);
        NilaiPullup::create([
            'ba_cowo' => 9,
            'bb_cowo' => 12,
            'ba_cewe' => 31,
            'bb_cewe' => 45,
            'bobot' => 3,
            'status' => 'Cukup'
        ]);
        NilaiPullup::create([
            'ba_cowo' => 13,
            'bb_cowo' => 17,
            'ba_cewe' => 45,
            'bb_cewe' => 59,
            'bobot' => 4,
            'status' => 'Baik'
        ]);
        NilaiPullup::create([
            'ba_cowo' => 18,
            'bb_cowo' => 50,
            'ba_cewe' => 60,
            'bb_cewe' => 100,
            'bobot' => 5,
            'status' => 'Sangat Baik'
        ]);
    }
}
