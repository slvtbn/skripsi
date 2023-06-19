@extends('master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary" style="width: 20%">
                <i class="fa fa-bell fa-2x" style="color: white;"></i>
            </div>
            <div class="card-wrap">
                <div class="card-body p-4 mt-2">
                    Welcome Administrator!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-clipboard"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Data Aspek</h4>
                </div>
                <div class="card-body">
                {{ $aspek }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Data Kriteria</h4>
            </div>
            <div class="card-body">
            {{ $kriteria }}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-success">
            <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Data Calon Paskibra</h4>
            </div>
            <div class="card-body">
            {{ $capas }}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-success">
            <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Data Nilai</h4>
            </div>
            <div class="card-body">
            {{ $nilai }}
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
            <i class="far fa-hourglass"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
            <h4>Data Perhitungan</h4>
            </div>
            <div class="card-body">
            {{ $perhitungan }}
            </div>
        </div>
        </div>
    </div>
</div>
@endsection