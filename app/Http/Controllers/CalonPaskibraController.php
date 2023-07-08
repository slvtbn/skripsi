<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
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
        // ambil data dari database menggunakan model
        $data_paskib = CalonPaskibra::where('periode', $request->periode)->get();

        $data_paskib->transform(function ($item) {
            $item->tgl_lahir = Carbon::parse($item->tgl_lahir)->isoFormat('D MMM Y');
            return $item;
        });

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Tampilkan',
            'data' => $data_paskib,
        ]);
    }

    // public function calonPaskibShowDataPaginate(Request $request) {
    //     // ambil nomor halaman dari permintaan ajax
    //     $page = $request->page;

    //     if($request->periode != null) {
    //         $periode = $request->periode;
    //     }else {
    //         $periode = Carbon::now()->format('Y');
    //     }

    //     if($page == 2) {
    //         $activePage = 2;
    //     }

    //     // jumlah item per halaman
    //     $perPage = 10;

    //     // ambil data dari database menggunakan model
    //     $data_paskib = CalonPaskibra::where('periode', $periode)->paginate($perPage, ['*'], 'page', $page);

    //     $pagination = $data_paskib->links('pagination::bootstrap-4')->render();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data Berhasil di Tampilkan',
    //         'data' => $data_paskib,
    //         'pagination' => $pagination,
    //         'page' => $page,
    //         'periode' => $request->periode,
    //         'activePage' => $activePage
    //     ]);
    // }

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

    public function calonPaskibPrint(Request $request) {
        $periode = $request->periode;
        $capas = CalonPaskibra::where('periode', $periode)->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('layouts.paskibraka.calon_paskib.print', compact('capas', 'periode')));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // return $dompdf->stream('hasil-seleksi.pdf');
        $output = $dompdf->output();

        // simpan file PDF penyimpanan local di server
        $filename = 'calon-paskibra.pdf';
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
