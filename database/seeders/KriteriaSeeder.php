<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kriteria::create([
            'aspek_id' => 1,
            'simbol' => 'K1',
            'kriteria' => 'Akademik',
            'nilai_target' => 4,
            'kelas' => 'Secondary Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 2,
            'simbol' => 'K2',
            'kriteria' => 'Jalan ditempat',
            'nilai_target' => 5,
            'kelas' => 'Core Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 2,
            'simbol' => 'K3',
            'kriteria' => 'Langkah tegap',
            'nilai_target' => 5,
            'kelas' => 'Core Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 2,
            'simbol' => 'K4',
            'kriteria' => 'Penghormatan',
            'nilai_target' => 5,
            'kelas' => 'Core Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 2,
            'simbol' => 'K5',
            'kriteria' => 'Belok kanan / kiri',
            'nilai_target' => 5,
            'kelas' => 'Core Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 2,
            'simbol' => 'K6',
            'kriteria' => 'Hadap kanan / kiri',
            'nilai_target' => 4,
            'kelas' => 'Secondary Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 3,
            'simbol' => 'K7',
            'kriteria' => 'Lari',
            'nilai_target' => 5,
            'kelas' => 'Core Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 3,
            'simbol' => 'K8',
            'kriteria' => 'Push up',
            'nilai_target' => 5,
            'kelas' => 'Core Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 3,
            'simbol' => 'K9',
            'kriteria' => 'Sit up',
            'nilai_target' => 4,
            'kelas' => 'Secondary Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 3,
            'simbol' => 'K10',
            'kriteria' => 'Pull up',
            'nilai_target' => 4,
            'kelas' => 'Secondary Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 4,
            'simbol' => 'K11',
            'kriteria' => 'Tinggi badan',
            'nilai_target' => 5,
            'kelas' => 'Core Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 4,
            'simbol' => 'K12',
            'kriteria' => 'Berat badan',
            'nilai_target' => 4,
            'kelas' => 'Secondary Factor'
        ]);
        Kriteria::create([
            'aspek_id' => 4,
            'simbol' => 'K13',
            'kriteria' => 'Bentuk kaki',
            'nilai_target' => 4,
            'kelas' => 'Secondary Factor'
        ]);
    }
}
