<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonPaskibra;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CalonPaskibrakaRequest;

class CalonPaskibraController extends Controller
{
    public function calonPaskibShow() {
        $data_paskib = CalonPaskibra::all();
        return view('layouts.paskibraka.calon_paskib.show', compact('data_paskib'));
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

        Alert::success('Success','Berhasil Menghapus Data');
        return redirect()->route('show-calon-paskib');
    }
}
