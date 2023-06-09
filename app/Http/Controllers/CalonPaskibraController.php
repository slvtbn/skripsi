<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CalonPaskibra;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CalonPaskibrakaRequest;

class CalonPaskibraController extends Controller
{
    public function calonPaskibShow() {
        $tahun_sekarang = Carbon::now()->format('Y');
        $data_paskib = CalonPaskibra::where('periode', $tahun_sekarang)->get();
        // dd($data_paskib);
        return view('layouts.paskibraka.calon_paskib.show', compact('data_paskib'));
    }

    public function calonPaskibShowPeriode(Request $request) {
        $data_paskib = CalonPaskibra::where('periode', $request->periode)->get();
        // return view('layouts.paskibraka.calon_paskib.show', compact('data_paskib'));

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Tampilkan',
            'data' => $data_paskib
        ]);
    }

    public function calonPaskibAdd(CalonPaskibrakaRequest $request) {
        $data = $request->all();
        CalonPaskibra::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Tambahkan',
            'data' => $data
        ]);
    }

    public function calonPaskibEdit($id) {
        $data = CalonPaskibra::find($id);
        return $data;
    }

    public function calonPaskibUpdate(CalonPaskibrakaRequest $request, $id) {
        $data = CalonPaskibra::find($id);
        $data->update([
            'periode' => $request->periode,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Update',
            'data' => $data
        ]);
    }

    public function calonPaskibDelete($id) {
        $data = CalonPaskibra::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Hapus',
            'data' => $data
        ]);
    }
}
