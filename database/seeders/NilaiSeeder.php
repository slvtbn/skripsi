<?php

namespace Database\Seeders;

use App\Models\Nilai;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nilai::create([
            'calon_paskibraka_id' => 1,
            'akademik' => 100,
            'jalan_ditempat' => 90,
            'langkah_tegap' => 90,
            'penghormatan' => 90,
            'belok' => 85,
            'hadap' => 80,
            'lari' => 7,
            'pushup' => 40,
            'situp' => 40,
            'pullup' => 45,
            'tb' => 168,
            'bb' => 60,
            'bentuk_kaki' => 5
        ]);
        Nilai::create([
            'calon_paskibraka_id' => 2,
            'akademik' => 70,
            'jalan_ditempat' => 95,
            'langkah_tegap' => 95,
            'penghormatan' => 80,
            'belok' => 85,
            'hadap' => 80,
            'lari' => 8,
            'pushup' => 40,
            'situp' => 40,
            'pullup' => 10,
            'tb' => 175,
            'bb' => 70,
            'bentuk_kaki' => 3
        ]);
    }
}
