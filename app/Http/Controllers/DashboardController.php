<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Nilai;
use App\Models\Kriteria;
use App\Models\BobotNilai;
use Illuminate\Http\Request;
use App\Models\CalonPaskibra;

class DashboardController extends Controller
{
    public function dashboardShow() {
        $aspek = Aspek::count();
        $kriteria = Kriteria::count();
        $capas = CalonPaskibra::count();
        $nilai = Nilai::count();
        $perhitungan = BobotNilai::count();
        return view('layouts.dashboard', compact('aspek', 'kriteria', 'capas', 'nilai', 'perhitungan'));
    }
}
