@extends('master')

@section('title', 'Hasil Seleksi')

@section('content')
    <a href="{{ route('print-hasil-seleksi') }}" class="btn btn-primary btn-action mb-3" style="width: 10%"><i class="fas fa-print pt-1 pr-2"></i>Print</a>
    <div class="card" style="width: 60%">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($bobotGap as $key => $bg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $bg->nilai_gap->bobot_nilai->nilai->calon_paskibraka->name }}</td>
                            <td>{{ $bg->nilai_gap->bobot_nilai->nilai->calon_paskibraka->jenis_kelamin }}</td>
                            <td>{{ $bg->nilai_gap->bobot_nilai->nilai->calon_paskibraka->asal_sekolah }}</td>
                            <td>{{ $key+1 }}</td>
                        </tr>            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
@endsection