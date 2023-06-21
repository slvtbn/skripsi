@extends('master')

@section('title', 'Hasil Perangkingan')

@section('content')
    <a href="{{ route('print-hasil-seleksi') }}" class="btn btn-primary btn-action mb-3" style="width: 10%"><i class="fas fa-print pt-1 pr-2"></i>Print</a>
    {{-- combo pilih periode --}}
    <div class="container" style="width:60%; margin: 0; padding: 0">
        <div class="form-group ml-auto" style="width: 50%">
            <select class="form-control" id="periode-tampil-hasil-rangking" name="periode">
                <option value="" disabled selected>-- Pilih Tahun Periode --</option>
                @php
                    $tahun_now = \Carbon\Carbon::now()->format('Y');
                    $tahun_last = \Carbon\Carbon::now()->format('Y')-5;
                @endphp
    
                @for($i = $tahun_now; $i >= $tahun_last; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="table-hasil-perangkingan">
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
    </div>
@endsection