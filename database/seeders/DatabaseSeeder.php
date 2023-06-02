<?php

namespace Database\Seeders;

// use App\Models\TableGap;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TableGapSeeder::class,
            NilaiLariSeeder::class,
            NilaiPbbTulisSeeder::class,
            NilaiPullupSeeder::class,
            NilaiPushupSitupSeeder::class,
            NilaiTbSeeder::class,
            AspekSeeder::class,
            CalonPaskibraSeeder::class,
            KriteriaSeeder::class,
        ]);
    }
}
