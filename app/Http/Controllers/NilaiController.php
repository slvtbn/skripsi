<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Nilai;
use Illuminate\Http\Request;
use App\Models\CalonPaskibra;
use App\Http\Requests\NilaiRequest;

class NilaiController extends Controller
{
    public function nilaiShow() {
        $tahun_sekarang = Carbon::now()->format('Y');
        $data_calon = CalonPaskibra::all();
        $data_nilai = Nilai::with('calon_paskibraka')
                            ->whereHas('calon_paskibraka', function($query) use ($tahun_sekarang) {
                                $query->where('periode', $tahun_sekarang);
                            })
                            ->get();

        return view('layouts.paskibraka.nilai.show', compact('data_calon', 'data_nilai'));
    }

    public function nilaiModalTambah(Request $request) {
        $periode = $request->periode;
        $data = CalonPaskibra::where('periode', $periode)->get();

        return response()->json([
            'success' => true,
            'message' => 'Data Capas Berhasil di Dapatkan',
            'data' => $data
        ]);
    }

    public function nilaiShowPeriode(Request $request) {
        $periode = $request->periode;
        $data = Nilai::with('calon_paskibraka')
                    ->whereHas('calon_paskibraka', function ($query) use ($periode) {
                        $query->where('periode', $periode);
                    })
                    ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data Nilai Berhasil di Tampilkan',
            'data' => $data
        ]);
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

    public function nilaiPrint(Request $request) {
        $periode = $request->periode;
        $data_nilai = Nilai::with('calon_paskibraka')
                            ->whereHas('calon_paskibraka', function($query) use ($periode) {
                                $query->where('periode', $periode);
                            })
                            ->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('layouts.paskibraka.nilai.print', compact('data_nilai', 'periode')));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // return $dompdf->stream('hasil-seleksi.pdf');
        $output = $dompdf->output();

        // simpan file PDF penyimpanan local di server
        $filename = 'nilai.pdf';
        $path = public_path('pdfs/'.$filename);
        file_put_contents($path, $output);

        // kembalikan url tautan ke client

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Print',
            'url' => url('pdfs/'.$filename)
        ]);
    }
}
