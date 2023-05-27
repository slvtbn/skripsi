<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardShow() {
        return view('layouts.dashboard');
    }
}
