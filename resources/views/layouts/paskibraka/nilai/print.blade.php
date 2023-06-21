<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilai Seleksi</title>
    <style>
        table {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <h3>Daftar Nilai Seleksi Calon Paskibraka Periode {{ $periode }}</h3>
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
                @foreach ($data_nilai as $nilai)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $nilai->calon_paskibraka->name }}</td>
                    <td>{{ $nilai->akademik }}</td>
                    <td>{{ $nilai->jalan_ditempat }}</td>
                    <td>{{ $nilai->langkah_tegap }}</td>
                    <td>{{ $nilai->penghormatan }}</td>
                    <td>{{ $nilai->belok }}</td>
                    <td>{{ $nilai->hadap }}</td>
                    <td>{{ $nilai->lari }}</td>
                    <td>{{ $nilai->pushup }}</td>
                    <td>{{ $nilai->situp }}</td>
                    <td>{{ $nilai->pullup }}</td>
                    <td>{{ $nilai->tb }}</td>
                    <td>{{ $nilai->bb }}</td>
                    <td>{{ $nilai->bentuk_kaki }}</td>
                </tr>            
                @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>