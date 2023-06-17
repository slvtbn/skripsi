<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\NilaiTb;
use App\Models\BobotGap;
use App\Models\Kriteria;
use App\Models\NilaiGap;
use App\Models\TableGap;
use App\Models\NilaiLari;
use App\Models\BobotNilai;
use App\Models\NilaiPullup;
use Illuminate\Http\Request;
use App\Models\NilaiPbbTulis;
use App\Models\NilaiPushupSitup;
use Dompdf\Dompdf;

class PerhitunganController extends Controller
{
    // fungsi untuk menghitung menggunakan metode profile matching
    public function perhitungan() {

        // $updateData = Nilai::whereColumn('updated_at', '!=', 'created_at')->get();

        // dd($updateData);


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
            $bobot_pullup = bobot2($skalaPullup, $nilai->pullup, $nilai->calon_paskibraka->jenis_kelamin);
            $bobot_tb = bobot2($skalaTb, $nilai->tb, $nilai->calon_paskibraka->jenis_kelamin);
            $bobot_bb = bobot3($nilai->tb, $nilai->bb);

            if($nilai->created_at != $nilai->updated_at) {
                $bobotNilai = BobotNilai::where('nilai_id', $nilai->id);

                if($bobotNilai->exists()) {
                    $bobotNilai->update([
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
                }else {
                    BobotNilai::create([
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
            }else {
                $bobot = BobotNilai::firstOrCreate(
                    [
                        'nilai_id' => $nilai->id
                    ],
                    [
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

            // memasukkan bobot nilai pada table tb_bobot_nilai
            // $bobot = BobotNilai::create([
                // 'nilai_id' => $nilai->id,
                // 'bobot_akademik' => $bobot_akademik,
                // 'bobot_jalan_ditempat' => $bobot_jalan_ditempat,
                // 'bobot_langkah_tegap' => $bobot_langkah_tegap,
                // 'bobot_penghormatan' => $bobot_penghormatan,
                // 'bobot_belok' => $bobot_belok,
                // 'bobot_hadap' => $bobot_hadap,
                // 'bobot_lari' => $bobot_lari,
                // 'bobot_pushup' => $bobot_pushup,
                // 'bobot_situp' => $bobot_situp,
                // 'bobot_pullup' => $bobot_pullup,
                // 'bobot_tb' => $bobot_tb,
                // 'bobot_bb' => $bobot_bb,
                // 'bobot_bentuk_kaki' => $nilai->bentuk_kaki
            // ]);
        }

        // STEP 2 : Perhitungan nilai GAP = Nilai Attribute - Nilai Target
        $kriteria = Kriteria::all();
        $nilai_target = [];
        foreach($kriteria as $nilai) {
            $nilai_target[] = $nilai->nilai_target;
        }

        $bobot_nilai = BobotNilai::all();
        foreach($bobot_nilai as $bobot) {
            $gap_akademik = gap($bobot->bobot_akademik, $nilai_target[0]);
            $gap_jalan_ditempat = gap($bobot->bobot_jalan_ditempat, $nilai_target[1]);
            $gap_langkah_tegap = gap($bobot->bobot_langkah_tegap, $nilai_target[2]);
            $gap_penghormatan = gap($bobot->bobot_penghormatan, $nilai_target[3]);
            $gap_belok = gap($bobot->bobot_belok, $nilai_target[4]);
            $gap_hadap = gap($bobot->bobot_hadap, $nilai_target[5]);
            $gap_lari = gap($bobot->bobot_lari, $nilai_target[6]);
            $gap_pushup = gap($bobot->bobot_pushup, $nilai_target[7]);
            $gap_situp = gap($bobot->bobot_situp, $nilai_target[8]);
            $gap_pullup = gap($bobot->bobot_pullup, $nilai_target[9]);
            $gap_tb = gap($bobot->bobot_tb, $nilai_target[10]);
            $gap_bb = gap($bobot->bobot_bb, $nilai_target[11]);
            $gap_bentuk_kaki = gap($bobot->bobot_bentuk_kaki, $nilai_target[12]);

            if($bobot->created_at != $bobot->updated_at) {
                $nilaiGap = NilaiGap::where('bobot_nilai_id', $bobot->id);

                if($nilaiGap->exists()) {
                    $nilaiGap->update([
                        'gap_akademik' => $gap_akademik,
                        'gap_jalan_ditempat' => $gap_jalan_ditempat,
                        'gap_langkah_tegap' => $gap_langkah_tegap,
                        'gap_penghormatan' => $gap_penghormatan,
                        'gap_belok' => $gap_belok,
                        'gap_hadap' => $gap_hadap,
                        'gap_lari' => $gap_lari,
                        'gap_pushup' => $gap_pushup,
                        'gap_situp' => $gap_situp,
                        'gap_pullup' => $gap_pullup,
                        'gap_tb' => $gap_tb,
                        'gap_bb' => $gap_bb,
                        'gap_bentuk_kaki' => $gap_bentuk_kaki
                    ]);
                }else {
                    NilaiGap::create([
                        'bobot_nilai_id' => $bobot->id,
                        'gap_akademik' => $gap_akademik,
                        'gap_jalan_ditempat' => $gap_jalan_ditempat,
                        'gap_langkah_tegap' => $gap_langkah_tegap,
                        'gap_penghormatan' => $gap_penghormatan,
                        'gap_belok' => $gap_belok,
                        'gap_hadap' => $gap_hadap,
                        'gap_lari' => $gap_lari,
                        'gap_pushup' => $gap_pushup,
                        'gap_situp' => $gap_situp,
                        'gap_pullup' => $gap_pullup,
                        'gap_tb' => $gap_tb,
                        'gap_bb' => $gap_bb,
                        'gap_bentuk_kaki' => $gap_bentuk_kaki
                    ]);
                }

            }else {
                $bobot = NilaiGap::firstOrCreate(
                [
                    'bobot_nilai_id' => $bobot->id
                ],
                [
                'bobot_nilai_id' => $bobot->id,
                'gap_akademik' => $gap_akademik,
                'gap_jalan_ditempat' => $gap_jalan_ditempat,
                'gap_langkah_tegap' => $gap_langkah_tegap,
                'gap_penghormatan' => $gap_penghormatan,
                'gap_belok' => $gap_belok,
                'gap_hadap' => $gap_hadap,
                'gap_lari' => $gap_lari,
                'gap_pushup' => $gap_pushup,
                'gap_situp' => $gap_situp,
                'gap_pullup' => $gap_pullup,
                'gap_tb' => $gap_tb,
                'gap_bb' => $gap_bb,
                'gap_bentuk_kaki' => $gap_bentuk_kaki
            ]);
            }

            // memasukkan nilai gap ke dalam table tb_nilai_gap
            // $bobot = NilaiGap::create([
            //     'bobot_nilai_id' => $bobot->id,
            //     'gap_akademik' => $gap_akademik,
            //     'gap_jalan_ditempat' => $gap_jalan_ditempat,
            //     'gap_langkah_tegap' => $gap_langkah_tegap,
            //     'gap_penghormatan' => $gap_penghormatan,
            //     'gap_belok' => $gap_belok,
            //     'gap_hadap' => $gap_hadap,
            //     'gap_lari' => $gap_lari,
            //     'gap_pushup' => $gap_pushup,
            //     'gap_situp' => $gap_situp,
            //     'gap_pullup' => $gap_pullup,
            //     'gap_tb' => $gap_tb,
            //     'gap_bb' => $gap_bb,
            //     'gap_bentuk_kaki' => $gap_bentuk_kaki
            // ]);
        }

        // // STEP 3 : Perhitungan bobot pada nilai GAP
        $tabel_gap = TableGap::all();
        $nilai_gap = NilaiGap::all();
        foreach($nilai_gap as $gap) {
            $bobot_gap_akademik = bobotGap($gap->gap_akademik, $tabel_gap);
            $bobot_gap_jalan_ditempat = bobotGap($gap->gap_jalan_ditempat, $tabel_gap);
            $bobot_gap_langkah_tegap = bobotGap($gap->gap_langkah_tegap, $tabel_gap);
            $bobot_gap_penghormatan = bobotGap($gap->gap_penghormatan, $tabel_gap);
            $bobot_gap_belok = bobotGap($gap->gap_belok, $tabel_gap);
            $bobot_gap_hadap = bobotGap($gap->gap_hadap, $tabel_gap);
            $bobot_gap_lari = bobotGap($gap->gap_lari, $tabel_gap);
            $bobot_gap_pushup = bobotGap($gap->gap_pushup, $tabel_gap);
            $bobot_gap_situp = bobotGap($gap->gap_situp, $tabel_gap);
            $bobot_gap_pullup = bobotGap($gap->gap_pullup, $tabel_gap);
            $bobot_gap_tb = bobotGap($gap->gap_tb, $tabel_gap);
            $bobot_gap_bb = bobotGap($gap->gap_bb, $tabel_gap);
            $bobot_gap_bentuk_kaki = bobotGap($gap->gap_bentuk_kaki, $tabel_gap);

            // Perhitungan Core Factor dan Secondary Factor
            $cf = ($bobot_gap_jalan_ditempat + $bobot_gap_langkah_tegap + $bobot_gap_penghormatan + $bobot_gap_belok + $bobot_gap_lari + $bobot_gap_pushup + $bobot_gap_tb) / 7;

            $sf = ($bobot_gap_akademik + $bobot_gap_hadap + $bobot_gap_situp + $bobot_gap_pullup + $bobot_gap_bb + $bobot_gap_bentuk_kaki) / 6;

            // Perhitungan Nilai rata-rata = 60% x CF + 40% x SF
            $nilai_akhir = (0.6 * $cf) + (0.4 * $sf);

            if($gap->created_at != $gap->updated_at) {
                $bobotGap = BobotGap::where('nilai_gap_id', $gap->id);
                if($bobotGap->exists()) {
                    $bobotGap->update([
                        'bobot_gap_akademik' => $bobot_gap_akademik,
                        'bobot_gap_jalan_ditempat' => $bobot_gap_jalan_ditempat,
                        'bobot_gap_langkah_tegap' => $bobot_gap_langkah_tegap,
                        'bobot_gap_penghormatan' => $bobot_gap_penghormatan,
                        'bobot_gap_belok' => $bobot_gap_belok,
                        'bobot_gap_hadap' => $bobot_gap_hadap,
                        'bobot_gap_lari' => $bobot_gap_lari,
                        'bobot_gap_pushup' => $bobot_gap_pushup,
                        'bobot_gap_situp' => $bobot_gap_situp,
                        'bobot_gap_pullup' => $bobot_gap_pullup,
                        'bobot_gap_tb' => $bobot_gap_tb,
                        'bobot_gap_bb' => $bobot_gap_bb,
                        'bobot_gap_bentuk_kaki' => $bobot_gap_bentuk_kaki,
                        'cf' => $cf,
                        'sf' => $sf,
                        'nilai_akhir' => $nilai_akhir
                    ]);
                }else {
                    BobotGap::create([
                        'nilai_gap_id' => $gap->id,
                        'bobot_gap_akademik' => $bobot_gap_akademik,
                        'bobot_gap_jalan_ditempat' => $bobot_gap_jalan_ditempat,
                        'bobot_gap_langkah_tegap' => $bobot_gap_langkah_tegap,
                        'bobot_gap_penghormatan' => $bobot_gap_penghormatan,
                        'bobot_gap_belok' => $bobot_gap_belok,
                        'bobot_gap_hadap' => $bobot_gap_hadap,
                        'bobot_gap_lari' => $bobot_gap_lari,
                        'bobot_gap_pushup' => $bobot_gap_pushup,
                        'bobot_gap_situp' => $bobot_gap_situp,
                        'bobot_gap_pullup' => $bobot_gap_pullup,
                        'bobot_gap_tb' => $bobot_gap_tb,
                        'bobot_gap_bb' => $bobot_gap_bb,
                        'bobot_gap_bentuk_kaki' => $bobot_gap_bentuk_kaki,
                        'cf' => $cf,
                        'sf' => $sf,
                        'nilai_akhir' => $nilai_akhir
                    ]);
                }
            }else {
                $bobot = BobotGap::firstOrCreate(
                    [
                        'nilai_gap_id' => $gap->id
                    ],
                    [
                    'nilai_gap_id' => $gap->id,
                    'bobot_gap_akademik' => $bobot_gap_akademik,
                    'bobot_gap_jalan_ditempat' => $bobot_gap_jalan_ditempat,
                    'bobot_gap_langkah_tegap' => $bobot_gap_langkah_tegap,
                    'bobot_gap_penghormatan' => $bobot_gap_penghormatan,
                    'bobot_gap_belok' => $bobot_gap_belok,
                    'bobot_gap_hadap' => $bobot_gap_hadap,
                    'bobot_gap_lari' => $bobot_gap_lari,
                    'bobot_gap_pushup' => $bobot_gap_pushup,
                    'bobot_gap_situp' => $bobot_gap_situp,
                    'bobot_gap_pullup' => $bobot_gap_pullup,
                    'bobot_gap_tb' => $bobot_gap_tb,
                    'bobot_gap_bb' => $bobot_gap_bb,
                    'bobot_gap_bentuk_kaki' => $bobot_gap_bentuk_kaki,
                    'cf' => $cf,
                    'sf' => $sf,
                    'nilai_akhir' => $nilai_akhir
                ]);
            }

            //memasukkan nilai gap ke dalam table tb_nilai_gap
            // $bobot = BobotGap::create([
            //     'nilai_gap_id' => $gap->id,
            //     'bobot_gap_akademik' => $bobot_gap_akademik,
            //     'bobot_gap_jalan_ditempat' => $bobot_gap_jalan_ditempat,
            //     'bobot_gap_langkah_tegap' => $bobot_gap_langkah_tegap,
            //     'bobot_gap_penghormatan' => $bobot_gap_penghormatan,
            //     'bobot_gap_belok' => $bobot_gap_belok,
            //     'bobot_gap_hadap' => $bobot_gap_hadap,
            //     'bobot_gap_lari' => $bobot_gap_lari,
            //     'bobot_gap_pushup' => $bobot_gap_pushup,
            //     'bobot_gap_situp' => $bobot_gap_situp,
            //     'bobot_gap_pullup' => $bobot_gap_pullup,
            //     'bobot_gap_tb' => $bobot_gap_tb,
            //     'bobot_gap_bb' => $bobot_gap_bb,
            //     'bobot_gap_bentuk_kaki' => $bobot_gap_bentuk_kaki,
            //     'cf' => $cf,
            //     'sf' => $sf,
            //     'nilai_akhir' => $nilai_akhir
            // ]);

            
        }
    }

    // fungsi untuk menampilkan halaman hasil perhitungan
    public function hasilPerhitunganShow() {
        $bobotNilai = BobotNilai::all();
        $nilaiGap = NilaiGap::all();
        $bobotGap = BobotGap::all();
        return view('layouts.perhitungan.hasil_perhitungan.show', compact('bobotNilai', 'nilaiGap', 'bobotGap'));
    }

    // fungsi untuk menampilkan hasil seleksi
    public function hasilSeleksiShow() {
        $bobotGap = BobotGap::orderBy('nilai_akhir', 'desc')->get();
        return view('layouts.perhitungan.hasil_seleksi.show', compact('bobotGap'));
    }

    // fungsi untuk mencetak hasil seleksi
    public function hasilSeleksiPrint() {
        $bobotGap = BobotGap::orderBy('nilai_akhir', 'desc')->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('layouts.perhitungan.hasil_seleksi.print', compact('bobotGap'))->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('hasil-seleksi.pdf');
    }
} 
