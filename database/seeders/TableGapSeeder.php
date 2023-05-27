<?php

namespace Database\Seeders;

use App\Models\TableGap;
use Illuminate\Database\Seeder;

class TableGapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        TableGap::create([
            'selisih' => 0,
            'bobot_nilai' => 5,
            'ket' => 'Tidak ada selisih'
        ]);
        TableGap::create([
            'selisih' => 1,
            'bobot_nilai' => 4.5,
            'ket' => 'Kompetensi individu kelebihan 1 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => -1,
            'bobot_nilai' => 4,
            'ket' => 'Kompetensi individu kekurangan 1 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => 2,
            'bobot_nilai' => 3.5,
            'ket' => 'Kompetensi individu kelebihan 2 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => -2,
            'bobot_nilai' => 3,
            'ket' => 'Kompetensi individu kekurangan 2 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => 3,
            'bobot_nilai' => 2.5,
            'ket' => 'Kompetensi individu kelebihan 3 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => -3,
            'bobot_nilai' => 2,
            'ket' => 'Kompetensi individu kekurangan 3 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => 4,
            'bobot_nilai' => 1.5,
            'ket' => 'Kompetensi individu kelebihan 4 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => -4,
            'bobot_nilai' => 1,
            'ket' => 'Kompetensi individu kekurangan 4 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => 5,
            'bobot_nilai' => 0.5,
            'ket' => 'Kompetensi individu kelebihan 5 tingkat/level'
        ]);
        TableGap::create([
            'selisih' => -5,
            'bobot_nilai' => 0,
            'ket' => 'Kompetensi individu kekurangan 5 tingkat/level'
        ]);
    }
}
