@extends('master')

@section('title', 'Hasil Perhitungan')

@section('content')
    <h6>Bobot Nilai</h6>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>K1</th>
                            <th>K2</th>
                            <th>K3</th>
                            <th>K4</th>
                            <th>K5</th>
                            <th>K6</th>
                            <th>K7</th>
                            <th>K8</th>
                            <th>K9</th>
                            <th>K10</th>
                            <th>K11</th>
                            <th>K12</th>
                            <th>K13</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($bobotNilai as $bobot)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $bobot->nilai->calon_paskibraka->name }}</td>
                           <td>{{ $bobot->bobot_akademik }}</td>
                           <td>{{ $bobot->bobot_jalan_ditempat }}</td>
                           <td>{{ $bobot->bobot_langkah_tegap }}</td>
                           <td>{{ $bobot->bobot_penghormatan }}</td>
                           <td>{{ $bobot->bobot_belok }}</td>
                           <td>{{ $bobot->bobot_hadap }}</td>
                           <td>{{ $bobot->bobot_lari }}</td>
                           <td>{{ $bobot->bobot_pushup }}</td>
                           <td>{{ $bobot->bobot_situp }}</td>
                           <td>{{ $bobot->bobot_pullup }}</td>
                           <td>{{ $bobot->bobot_tb }}</td>
                           <td>{{ $bobot->bobot_bb }}</td>
                           <td>{{ $bobot->bobot_bentuk_kaki }}</td>
                       </tr>            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h6>Pemetaan Nilai Gap</h6>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>K1</th>
                        <th>K2</th>
                        <th>K3</th>
                        <th>K4</th>
                        <th>K5</th>
                        <th>K6</th>
                        <th>K7</th>
                        <th>K8</th>
                        <th>K9</th>
                        <th>K10</th>
                        <th>K11</th>
                        <th>K12</th>
                        <th>K13</th>
                    </tr>
                    </thead>
                    <tbody>
                         @php
                            $no = 1;
                        @endphp
                        @foreach ($nilaiGap as $gap)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $gap->bobot_nilai->nilai->calon_paskibraka->name }}</td>
                           <td>{{ $gap->gap_akademik }}</td>
                           <td>{{ $gap->gap_jalan_ditempat }}</td>
                           <td>{{ $gap->gap_langkah_tegap }}</td>
                           <td>{{ $gap->gap_penghormatan }}</td>
                           <td>{{ $gap->gap_belok }}</td>
                           <td>{{ $gap->gap_hadap }}</td>
                           <td>{{ $gap->gap_lari }}</td>
                           <td>{{ $gap->gap_pushup }}</td>
                           <td>{{ $gap->gap_situp }}</td>
                           <td>{{ $gap->gap_pullup }}</td>
                           <td>{{ $gap->gap_tb }}</td>
                           <td>{{ $gap->gap_bb }}</td>
                           <td>{{ $gap->gap_bentuk_kaki }}</td>
                       </tr>            
                        @endforeach            
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h6>Core Factor</h6>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>K2</th>
                        <th>K3</th>
                        <th>K4</th>
                        <th>K5</th>
                        <th>K7</th>
                        <th>K8</th>
                        <th>K11</th>
                        <th>Core Factor</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($bobotGap as $bg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $bg->nilai_gap->bobot_nilai->nilai->calon_paskibraka->name }}</td>
                            <td>{{ $bg->bobot_gap_jalan_ditempat }}</td>
                            <td>{{ $bg->bobot_gap_langkah_tegap }}</td>
                            <td>{{ $bg->bobot_gap_penghormatan }}</td>
                            <td>{{ $bg->bobot_gap_belok }}</td>
                            <td>{{ $bg->bobot_gap_lari }}</td>
                            <td>{{ $bg->bobot_gap_pushup }}</td>
                            <td>{{ $bg->bobot_gap_tb }}</td>
                            <td>{{ $bg->cf }}</td>
                        </tr>                
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h6>Secondary Factor</h6>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>K1</th>
                        <th>K6</th>
                        <th>K9</th>
                        <th>K10</th>
                        <th>K12</th>
                        <th>K13</th>
                        <th>Secondary Factor</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($bobotGap as $bg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $bg->nilai_gap->bobot_nilai->nilai->calon_paskibraka->name }}</td>
                            <td>{{ $bg->bobot_gap_akademik }}</td>
                            <td>{{ $bg->bobot_gap_hadap }}</td>
                            <td>{{ $bg->bobot_gap_situp }}</td>
                            <td>{{ $bg->bobot_gap_pullup }}</td>
                            <td>{{ $bg->bobot_gap_bb }}</td>
                            <td>{{ $bg->bobot_gap_bentuk_kaki }}</td>
                            <td>{{ $bg->sf }}</td>
                        </tr>                
                        @endforeach            
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <h6>Nilai Akhir</h6>
    <div class="card" style="width: 40%">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Nilai Akhir</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($bobotGap as $bg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $bg->nilai_gap->bobot_nilai->nilai->calon_paskibraka->name }}</td>
                            <td>{{ $bg->nilai_akhir }}</td>
                        </tr>                
                        @endforeach            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection