<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Perhitungan</title>
    <style>
        table {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <h3>Hasil Perhitungan Metode Profile Matching Periode {{ $periode }}</h3>
        <br>
        <h4>Bobot Nilai</h4>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
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
                @foreach ($bobotGap as $bobot)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->nilai->calon_paskibraka->name }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_akademik }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_jalan_ditempat }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_langkah_tegap }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_penghormatan }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_belok }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_hadap }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_lari }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_pushup }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_situp }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_pullup }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_tb }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_bb }}</td>
                    <td>{{ $bobot->nilai_gap->bobot_nilai->bobot_bentuk_kaki }}</td>
                </tr>            
                @endforeach
            </tbody>
        </table>

        <br>
        <h4>Pemetaan Nilai Gap</h4>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
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
                @foreach ($bobotGap as $gap)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $gap->nilai_gap->bobot_nilai->nilai->calon_paskibraka->name }}</td>
                    <td>{{ $gap->nilai_gap->gap_akademik }}</td>
                    <td>{{ $gap->nilai_gap->gap_jalan_ditempat }}</td>
                    <td>{{ $gap->nilai_gap->gap_langkah_tegap }}</td>
                    <td>{{ $gap->nilai_gap->gap_penghormatan }}</td>
                    <td>{{ $gap->nilai_gap->gap_belok }}</td>
                    <td>{{ $gap->nilai_gap->gap_hadap }}</td>
                    <td>{{ $gap->nilai_gap->gap_lari }}</td>
                    <td>{{ $gap->nilai_gap->gap_pushup }}</td>
                    <td>{{ $gap->nilai_gap->gap_situp }}</td>
                    <td>{{ $gap->nilai_gap->gap_pullup }}</td>
                    <td>{{ $gap->nilai_gap->gap_tb }}</td>
                    <td>{{ $gap->nilai_gap->gap_bb }}</td>
                    <td>{{ $gap->nilai_gap->gap_bentuk_kaki }}</td>
                </tr>            
                @endforeach
            </tbody>
        </table>

        <br>
        <h4>Core Factor</h4>
        <table border="1" cellpadding="10" cellspacing="0">
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

        <br>
        <h4>Secondary Factor</h4>
        <table border="1" cellpadding="10" cellspacing="0">
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

        <br>
        <h4>Nilai Akhir</h4>
        <table border="1" cellpadding="10" cellspacing="0">
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
    </center>
</body>
</html>