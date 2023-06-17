<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use App\Models\CalonPaskibra;
use App\Http\Requests\NilaiRequest;

class NilaiController extends Controller
{
    public function nilaiShow() {
        $data_calon = CalonPaskibra::all();
        $data_nilai = Nilai::all();
        return view('layouts.paskibraka.nilai.show', compact('data_calon', 'data_nilai'));
    }

    public function nilaiAdd(NilaiRequest $request) {
        $data = $request->all();
        Nilai::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Tambahkan',
            'data' => $data
        ]);
    }

    public function nilaiEdit($id) {
        $data = Nilai::with('calon_paskibraka')->where('id', $id)->first();
        return $data;
    }

    public function nilaiUpdate(NilaiRequest $request, $id) {
        $data = Nilai::find($id);
        $data->update([
            'calon_paskibraka_id' => $request->calon_paskibraka_id,
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

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Hapus',
            'data' => $data
        ]);
    }
}
