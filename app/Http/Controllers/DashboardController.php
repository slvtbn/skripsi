<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Aspek;
use App\Models\Nilai;
use App\Models\Kriteria;
use App\Models\BobotNilai;
use Illuminate\Http\Request;
use App\Models\CalonPaskibra;

class DashboardController extends Controller
{
    public function dashboardShow() {
        $tahun_sekarang = Carbon::now()->format('Y');
        $capas = CalonPaskibra::where('periode', $tahun_sekarang)->count();
        $aspek = Aspek::count();
        $kriteria = Kriteria::count();
        // $capas = CalonPaskibra::count();
        $nilai = Nilai::with('calon_paskibraka')
                            ->whereHas('calon_paskibraka', function($query) use ($tahun_sekarang) {
                                $query->where('periode', $tahun_sekarang);
                            })
                            ->count();
        $perhitungan = BobotNilai::count();
        return view('layouts.dashboard', compact('aspek', 'kriteria', 'capas', 'nilai', 'perhitungan'));
    }
}
