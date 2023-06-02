<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\NilaiTb;
use App\Models\Kriteria;
use App\Models\NilaiLari;
use App\Models\BobotNilai;
use App\Models\NilaiPullup;
use Illuminate\Http\Request;
use App\Models\NilaiPbbTulis;
use App\Models\NilaiPushupSitup;

class PerhitunganController extends Controller
{
    // fungsi untuk menghitung menggunakan metode profile matching
    public function perhitungan() {
        // STEP 1 : menghitung bobot tiap nilai kriteria
        $nilai_seleksi = Nilai::all();
        $skalaTulisPbb = NilaiPbbTulis::all();
        $skalaLari = NilaiLari::all();
        $skalaPushupSitup = NilaiPushupSitup::all();
        $skalaPullup = NilaiPullup::all();
        $skalaTb = NilaiTb::all();

        foreach($nilai_seleksi as $nilai) {
            $bobot_akademik = bobot($skalaTulisPbb, $nilai->akademik);
            $bobot_jalan_ditempat = bobot($skalaTulisPbb, $nilai->jalan_ditempat);
            $bobot_langkah_tegap = bobot($skalaTulisPbb, $nilai->langkah_tegap);
            $bobot_penghormatan = bobot($skalaTulisPbb, $nilai->penghormatan);
            $bobot_belok = bobot($skalaTulisPbb, $nilai->belok);
            $bobot_hadap = bobot($skalaTulisPbb, $nilai->hadap);
            $bobot_lari = bobot($skalaLari, $nilai->lari);
            $bobot_pushup = bobot($skalaPushupSitup, $nilai->pushup);
            $bobot_situp = bobot($skalaPushupSitup, $nilai->situp);
            $bobot_pullup = bobot2($skalaPullup, $nilai->pullup, $nilai->jenis_kelamin);
            $bobot_tb = bobot2($skalaTb, $nilai->tb, $nilai->jenis_kelamin);
            $bobot_bb = bobot3($nilai->tb, $nilai->bb);

            $bobot = BobotNilai::create([
                'nilai_id' => $nilai->id,
                'bobot_akademik' => $bobot_akademik,
                'bobot_jalan_ditempat' => $bobot_jalan_ditempat,
                'bobot_langkah_tegap' => $bobot_langkah_tegap,
                'bobot_penghormatan' => $bobot_penghormatan,
                'bobot_belok' => $bobot_belok,
                'bobot_hadap' => $bobot_hadap,
                'bobot_lari' => $bobot_lari,
                'bobot_pushup' => $bobot_pushup,
                'bobot_situp' => $bobot_situp,
                'bobot_pullup' => $bobot_pullup,
                'bobot_tb' => $bobot_tb,
                'bobot_bb' => $bobot_bb,
                'bobot_bentuk_kaki' => $nilai->bentuk_kaki
            ]);
        }

        

        // menghitung nilai GAP = Nilai Attribute - Nilai Target
        // $data_kriteria = Kriteria::all();
        // $data_bobot = BobotNilai::all();
        // foreach($data_kriteria as $kriteria) {
        //     foreach($data_bobot as $bobot) {
        //         var_dump($bobot->akademik);
        //     }
        //     var_dump($kriteria->nilai_target);
        // }
    }
}
