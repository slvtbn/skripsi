<?php

namespace Database\Seeders;

use App\Models\NilaiLari;
use Illuminate\Database\Seeder;

class NilaiLariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NilaiLari::create([
            'batas_atas' => 0,
            'batas_bawah' => 1,
            'bobot' => 1,
            'status' => 'Tidak Memenuhi Syarat'
        ]);
        NilaiLari::create([
            'batas_atas' => 2,
            'batas_bawah' => 3,
            'bobot' => 2,
            'status' => 'Kurang'
        ]);
        NilaiLari::create([
            'batas_atas' => 4,
            'batas_bawah' => 5,
            'bobot' => 3,
            'status' => 'Cukup'
        ]);
        NilaiLari::create([
            'batas_atas' => 6,
            'batas_bawah' => 7,
            'bobot' => 4,
            'status' => 'Baik'
        ]);
        NilaiLari::create([
            'batas_atas' => 8,
            'batas_bawah' => 50,
            'bobot' => 5,
            'status' => 'Sangat Baik'
        ]);
    }
}
