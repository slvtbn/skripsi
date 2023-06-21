<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calon Paskibra</title>
    <style>
        table {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <h3>Daftar Calon Paskibraka Kab.Biak Numfor Periode {{ $periode }}</h3>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Asal Sekolah</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>No Telp</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($capas as $cps)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $cps->name }}</td>
                    <td>{{ $cps->alamat }}</td>
                    <td>{{ $cps->asal_sekolah }}</td>
                    <td>{{ $cps->jenis_kelamin }}</td>
                    <td>{{ $cps->tgl_lahir }}</td>
                    <td>{{ $cps->no_telp }}</td>
                </tr>            
                @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>