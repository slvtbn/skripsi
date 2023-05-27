<?php

namespace Database\Seeders;

use App\Models\Aspek;
use Illuminate\Database\Seeder;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aspek::create([
            'aspek' => 'Akademik'
        ]);
        Aspek::create([
            'aspek' => 'PBB'
        ]);
        Aspek::create([
            'aspek' => 'Jasmani'
        ]);
        Aspek::create([
            'aspek' => 'Fisik'
        ]);
    }
}
