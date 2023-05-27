<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use Illuminate\Http\Request;
use App\Http\Requests\AspekRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AspekController extends Controller
{
    public function aspekShow() {
        $data = Aspek::all();
        return view('layouts.penilaian.aspek.show', compact('data'));
    }

    public function aspekAdd(AspekRequest $request) {
        $data = $request->all();
        Aspek::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Tambahkan',
            'data' => $data
        ]);
    }

    public function aspekEdit($id) {
        $data = Aspek::find($id);
        return $data;
    }

    public function aspekUpdate(AspekRequest $request, $id) {
        $data = Aspek::find($id);
        $data->update([
            'aspek' => $request->aspek,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Update',
            'data' => $data
        ]);
    }

    public function aspekDelete($id) {
        $data = Aspek::where('id', $id)->delete();

        Alert::success('Berhasil Menghapus Data');
        return redirect()->route('show-aspek');
    }
}
