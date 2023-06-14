<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Seleksi</title>
    <style>
        table {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <h3>Hasil Seleksi Penerimaan Anggota Paskibraka</h3>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
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
    </center>
</body>
</html>