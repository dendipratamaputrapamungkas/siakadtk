<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Data Siswa TK</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Wali</th>
                <th>No. HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->tempatlahir }}</td>
                <td>{{ $siswa->tanggal_lhr }}</td>
                <td>{{ $siswa->jk }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->wali }}</td>
                <td>{{ $siswa->no_hp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
