<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Kriteria;
use Illuminate\Http\Response;
use App\Http\Requests\KriteriaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    public function kriteriaShow() {
        $data_aspek = Aspek::all();
        $data_kriteria = Kriteria::all();
        return view('layouts.penilaian.kriteria.show', compact('data_aspek', 'data_kriteria'));
    }

    public function kriteriaAdd(KriteriaRequest $request) {

        $data = Kriteria::create([
            'aspek_id' => $request->aspek_id,
            'simbol' => $request->simbol,
            'kriteria' => $request->kriteria,
            'nilai_target' => $request->nilai_target,
            'kelas' => $request->kelas,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Tambahkan',
            'data' => $data
        ]);
    }

    public function kriteriaEdit($id) {
        $data = Kriteria::find($id);
        return $data;
    }

    public function kriteriaUpdate($id, KriteriaRequest $request) {
        $data = Kriteria::find($id);
        $data->update([
            'aspek_id' => $request->aspek_id,
            'simbol' => $request->simbol,
            'kriteria' => $request->kriteria,
            'nilai_target' => $request->nilai_target,
            'kelas' => $request->kelas
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Update',
            'data' => $data
        ]);
    }

    public function kriteriaDelete($id) {
        $data = Kriteria::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Hapus',
            'data' => $data
        ]);
    }
}
