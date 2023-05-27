<?php

namespace App\Http\Controllers;

use App\Models\BobotNilai;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function perhitungan() {
        // menghitung nilai GAP = Nilai Attribute - Nilai Target
        $data_kriteria = Kriteria::all();
        $data_bobot = BobotNilai::all();
        foreach($data_kriteria as $kriteria) {
            foreach($data_bobot as $bobot) {
                var_dump($bobot->akademik);
            }
            var_dump($kriteria->nilai_target);
        }
    }
}
