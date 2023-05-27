<?php

namespace Database\Seeders;

use App\Models\NilaiPbbTulis;
use Illuminate\Database\Seeder;

class NilaiPbbTulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NilaiPbbTulis::create([
            'batas_atas' => 0,
            'batas_bawah' => 60,
            'bobot' => 1,
            'status' => 'Tidak Memenuhi Syarat'
        ]);
        NilaiPbbTulis::create([
            'batas_atas' => 61,
            'batas_bawah' => 70,
            'bobot' => 2,
            'status' => 'Kurang'
        ]);
        NilaiPbbTulis::create([
            'batas_atas' => 71,
            'batas_bawah' => 80,
            'bobot' => 3,
            'status' => 'Cukup'
        ]);
        NilaiPbbTulis::create([
            'batas_atas' => 81,
            'batas_bawah' => 90,
            'bobot' => 4,
            'status' => 'Baik'
        ]);
        NilaiPbbTulis::create([
            'batas_atas' => 91,
            'batas_bawah' => 100,
            'bobot' => 5,
            'status' => 'Sangat Baik'
        ]);
    }
}
