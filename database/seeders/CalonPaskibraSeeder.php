<?php

namespace Database\Seeders;

use App\Models\CalonPaskibra;
use Illuminate\Database\Seeder;

class CalonPaskibraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CalonPaskibra::create([
            'name' => 'Silva',
            'alamat' => 'Jl. Dolog no 33',
            'asal_sekolah' => 'SMA Negeri 1',
            'jenis_kelamin' => 'Perempuan',
            'tgl_lahir' => '2023-05-24',
            'no_telp' => '123456'
        ]);
        CalonPaskibra::create([
            'name' => 'Ridho',
            'alamat' => 'Jl. Dolog no 33',
            'asal_sekolah' => 'SMA Negeri 1',
            'jenis_kelamin' => 'Laki-laki',
            'tgl_lahir' => '2023-05-24',
            'no_telp' => '123456'
        ]);
        CalonPaskibra::create([
            'name' => 'Imam',
            'alamat' => 'Jl. Dolog no 33',
            'asal_sekolah' => 'SMA Negeri 1',
            'jenis_kelamin' => 'Laki-laki',
            'tgl_lahir' => '2023-05-24',
            'no_telp' => '123456'
        ]);
        CalonPaskibra::create([
            'name' => 'Yuanita',
            'alamat' => 'Jl. Dolog no 33',
            'asal_sekolah' => 'SMA Negeri 1',
            'jenis_kelamin' => 'Perempuan',
            'tgl_lahir' => '2023-05-24',
            'no_telp' => '123456'
        ]);
        CalonPaskibra::create([
            'name' => 'Egi',
            'alamat' => 'Jl. Dolog no 33',
            'asal_sekolah' => 'SMA Negeri 1',
            'jenis_kelamin' => 'Laki-laki',
            'tgl_lahir' => '2023-05-24',
            'no_telp' => '123456'
        ]);
        CalonPaskibra::create([
            'name' => 'Fikar',
            'alamat' => 'Jl. Dolog no 33',
            'asal_sekolah' => 'SMA Negeri 1',
            'jenis_kelamin' => 'Laki-laki',
            'tgl_lahir' => '2023-05-24',
            'no_telp' => '123456'
        ]);
    }
}
