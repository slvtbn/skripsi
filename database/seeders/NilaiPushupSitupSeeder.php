<?php

namespace Database\Seeders;

use App\Models\NilaiPushupSitup;
use Illuminate\Database\Seeder;

class NilaiPushupSitupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NilaiPushupSitup::create([
            'batas_atas' => 0,
            'batas_bawah' => 10,
            'bobot' => 1,
            'status' => 'Tidak Memenuhi Syarat'
        ]);
         NilaiPushupSitup::create([
            'batas_atas' => 11,
            'batas_bawah' => 20,
            'bobot' => 2,
            'status' => 'Kurang'
        ]);
         NilaiPushupSitup::create([
            'batas_atas' => 21,
            'batas_bawah' => 30,
            'bobot' => 3,
            'status' => 'Cukup'
        ]);
         NilaiPushupSitup::create([
            'batas_atas' => 31,
            'batas_bawah' => 39,
            'bobot' => 4,
            'status' => 'Baik'
        ]);
         NilaiPushupSitup::create([
            'batas_atas' => 40,
            'batas_bawah' => 100,
            'bobot' => 5,
            'status' => 'Sangat Baik'
        ]);
    }
}
