<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SkalaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\CalonPaskibraController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/', [DashboardController::class, 'dashboardShow'])->name('show-dashboard');
    
    Route::get('/aspek', [AspekController::class, 'aspekShow'])->name('show-aspek');
    Route::post('/aspek/add', [AspekController::class, 'aspekAdd'])->name('add-aspek');
    Route::get('/aspek/edit/{id}', [AspekController::class, 'aspekEdit'])->name('edit-aspek');
    Route::put('/aspek/update/{id}', [AspekController::class, 'aspekUpdate'])->name('updata-aspek');
    Route::delete('/aspek/delete/{id}', [AspekController::class, 'aspekDelete'])->name('delete-aspek');
    
    Route::get('/kriteria', [KriteriaController::class, 'kriteriaShow'])->name('show-kriteria');
    Route::post('/kriteria/add', [KriteriaController::class, 'kriteriaAdd'])->name('add-kriteria');
    Route::get('/kriteria/edit/{id}', [KriteriaController::class, 'kriteriaEdit'])->name('edit-kriteria');
    Route::put('/kriteria/update/{id}', [KriteriaController::class, 'kriteriaUpdate'])->name('update-kriteria');
    Route::delete('/kriteria/delete/{id}', [KriteriaController::class, 'kriteriaDelete'])->name('delete-kriteria');

    Route::get('/calon-paskib', [CalonPaskibraController::class, 'calonPaskibShow'])->name('show-calon-paskib');
    Route::post('/calon-paskib/add', [CalonPaskibraController::class, 'calonPaskibAdd'])->name('add-calon-paskib');
    Route::get('/calon-paskib/edit/{id}', [CalonPaskibraController::class, 'calonPaskibEdit'])->name('edit-calon-paskib');
    Route::put('/calon-paskib/update/{id}', [CalonPaskibraController::class, 'calonPaskibUpdate'])->name('update-calon-paskib');
    Route::delete('/calon-paskib/delete/{id}', [CalonPaskibraController::class, 'calonPaskibDelete'])->name('delete-calon-paskib');
    Route::get('/calon-paskib/periode-tampil', [CalonPaskibraController::class, 'calonPaskibShowPeriode'])->name('show-periode-capas');
    Route::get('/calon-paskib/show-data-paginate', [CalonPaskibraController::class, 'calonPaskibShowDataPaginate'])->name('show-capas-paginate');
    Route::get('/print-calon-paskibra', [CalonPaskibraController::class, 'calonPaskibPrint'])->name('print-calon-paskib');

    Route::get('/nilai', [NilaiController::class, 'nilaiShow'])->name('show-nilai');
    Route::get('/nilai/modal-tambah', [NilaiController::class, 'nilaiModalTambah'])->name('nilai-modal-tambah');
    // Route::get('/nilai/search-name', [NilaiController::class, 'searchName'])->name('search-name');
    Route::get('/nilai/detail/{id}', [NilaiController::class, 'nilaiEdit'])->name('detail-nilai');
    Route::post('/nilai/add', [NilaiController::class, 'nilaiAdd'])->name('add-nilai');
    Route::get('/nilai/edit/{id}', [NilaiController::class, 'nilaiEdit'])->name('edit-nilai');
    Route::put('/nilai/update/{id}', [NilaiController::class, 'nilaiUpdate'])->name('update-nilai');
    Route::delete('/nilai/delete/{id}', [NilaiController::class, 'nilaiDelete'])->name('delete-nilai');
    Route::get('/nilai/periode-tampil', [NilaiController::class, 'nilaiShowPeriode'])->name('show-periode-nilai');
    Route::get('/print-nilai', [NilaiController::class, 'nilaiPrint'])->name('print-nilai');

    Route::get('/perhitungan', [PerhitunganController::class, 'perhitungan'])->name('perhitungan');
    Route::get('/hasil-perhitungan', [PerhitunganController::class, 'hasilPerhitunganShow'])->name('show-hasil-perhitungan');
    Route::get('/hasil-perhitungan/periode-tampil', [PerhitunganController::class, 'hasilPerhitunganShowPeriode'])->name('show-periode-hasil');
    Route::get('/print-hasil-perhitungan', [PerhitunganController::class, 'hasilPerhitunganPrint'])->name('print-hasil-perhitungan');

    Route::get('/hasil-seleksi', [PerhitunganController::class, 'hasilSeleksiShow'])->name('show-hasil-seleksi');
    Route::get('/hasil-seleksi/periode-tampil', [PerhitunganController::class, 'hasilSeleksiPeriodeShow'])->name('show-periode-rangking');
    Route::get('/print-hasil-seleksi', [PerhitunganController::class, 'hasilSeleksiPrint'])->name('print-hasil-seleksi');
});
Route::get('/logout-spk', [UserController::class, 'logout'])->name('logout-spk');
