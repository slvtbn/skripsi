<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkalaPenilaian;

class SkalaController extends Controller
{
    public function skalaShow() {
        $data_skala = SkalaPenilaian::all();
        return view('layouts.penilaian.skala.show', compact('data_skala'));
    }
}
