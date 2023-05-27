<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\NilaiTb;
use App\Models\Kriteria;
use App\Models\NilaiLari;
use App\Models\BobotNilai;
use App\Models\NilaiPullup;
use Illuminate\Http\Request;
use App\Models\CalonPaskibra;
use App\Models\NilaiPbbTulis;
use App\Models\NilaiPushupSitup;
use App\Http\Requests\NilaiRequest;
use RealRashid\SweetAlert\Facades\Alert;

class NilaiController extends Controller
{
    public function nilaiShow() {
        $data_calon = CalonPaskibra::all();
        $data_nilai = Nilai::all();
        return view('layouts.paskibraka.nilai.show', compact('data_calon', 'data_nilai'));
    }

    public function searchName(Request $request) {
        $nama = CalonPaskibra::select('name', 'asal_sekolah', 'jenis_kelamin')->where('name', 'LIKE', '%'. $request->get('query'). '%')->get();
        return response()->json($nama);
    }

    public function nilaiAdd(NilaiRequest $request) {
        // STEP 1 : memberikan bobot pada tiap nilai kriteria
        $skalaTulisPbb = NilaiPbbTulis::all();
        $skalaLari = NilaiLari::all();
        $skalaPushupSitup = NilaiPushupSitup::all();
        $skalaPullup = NilaiPullup::all();
        $skalaTb = NilaiTb::all();

        $bobot_akademik = bobot($skalaTulisPbb, $request->akademik);
        $bobot_jalan_ditempat = bobot($skalaTulisPbb, $request->jalan_ditempat);
        $bobot_langkah_tegap = bobot($skalaTulisPbb, $request->langkah_tegap);
        $bobot_penghormatan = bobot($skalaTulisPbb, $request->penghormatan);
        $bobot_belok = bobot($skalaTulisPbb, $request->belok);
        $bobot_hadap = bobot($skalaTulisPbb, $request->hadap);
        $bobot_lari = bobot($skalaLari, $request->lari);
        $bobot_pushup = bobot($skalaPushupSitup, $request->pushup);
        $bobot_situp = bobot($skalaPushupSitup, $request->situp);
        $bobot_pullup = bobot2($skalaPullup, $request->pullup, $request->jenis_kelamin);
        $bobot_tb = bobot2($skalaTb, $request->tb, $request->jenis_kelamin);
        $bobot_bb = bobot3($request->tb, $request->bb);
        
        // menghitung nilai GAP = Value Attribute - Value Target
        // memberikan bobot untuk tiap nilai GAP
        // menghitung CoreFactor
        // menghitung SecondaryFactor
        // menghitung nilai akhir

        $data = $request->all();
        Nilai::create($data);

        // memasukkan bobot kedalam tabel tb_bobot_nilai
        $bobot = BobotNilai::create([
            'nama_capas' => $request->nama_lengkap,
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
            'bobot_bentuk_kaki' => $request->bentuk_kaki
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Tambahkan',
            'data' => $data
        ]);
    }

    public function nilaiEdit($id) {
        $data = Nilai::find($id);
        return $data;
    }

    public function nilaiUpdate(NilaiRequest $request, $id) {
        $data = Nilai::find($id);
        $data->update([
            'nama_lengkap' => $request->nama_lengkap,
            'asal_sekolah' => $request->asal_sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'akademik' => $request->akademik,
            'jalan_ditempat' => $request->jalan_ditempat,
            'langkah_tegap' => $request->langkah_tegap,
            'penghormatan' => $request->penghormatan,
            'belok' => $request->belok,
            'hadap' => $request->hadap,
            'lari' => $request->lari,
            'pushup' => $request->pushup,
            'situp' => $request->situp,
            'pullup' => $request->pullup,
            'tb' => $request->tb,
            'bb' => $request->bb,
            'bentuk_kaki' => $request->bentuk_kaki,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Update',
            'data' => $data
        ]);
    }

    public function nilaiDelete($id) {
        $data = Nilai::where('id', $id)->delete();

        Alert::success('Success', 'Berhasil Menghapus Data');
        return redirect()->route('show-nilai');
    }
}
