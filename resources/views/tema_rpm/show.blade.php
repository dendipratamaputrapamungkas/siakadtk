<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Tema RPM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <h3>Detail Tema RPM</h3>
    <hr>

    <div class="mb-3">
        <strong>Kelompok:</strong> {{ $rpp->kelompok }} <br>
        <strong>Tema:</strong> {{ $rpp->tema }} <br>
        <strong>Tanggal:</strong> {{ $rpp->tanggal }}
    </div>

    <hr>
    <h5>Dimensi Profil</h5>
    <ul>
        @forelse($rpp->dimensi as $item)
            <li>{{ $item->dimensi }}</li>
        @empty
            <li><em>Belum ada dimensi</em></li>
        @endforelse
    </ul>

    <h5>Tujuan Pembelajaran</h5>
    <ul>
        @forelse($rpp->tujuan as $item)
            <li>{{ $item->tujuan }}</li>
        @empty
            <li><em>Belum ada tujuan</em></li>
        @endforelse
    </ul>

    <h5>Langkah Pembelajaran — Pendahuluan</h5>
    <ul>
        @forelse($rpp->langkah->where('tahap','pendahuluan') as $item)
            <li>{{ $item->isi }}</li>
        @empty
            <li><em>Tidak ada langkah pendahuluan</em></li>
        @endforelse
    </ul>

    <h5>Langkah Pembelajaran — Inti</h5>
    <ul>
        @forelse($rpp->langkah->where('tahap','inti') as $item)
            <li>{{ $item->isi }}</li>
        @empty
            <li><em>Tidak ada langkah inti</em></li>
        @endforelse
    </ul>

    <h5>Langkah Pembelajaran — Penutup</h5>
    <ul>
        @forelse($rpp->langkah->where('tahap','penutup') as $item)
            <li>{{ $item->isi }}</li>
        @empty
            <li><em>Tidak ada langkah penutup</em></li>
        @endforelse
    </ul>

    <h5>Asesmen</h5>
    <ul>
        @forelse($rpp->asesmen as $item)
            <li>{{ $item->jenis }}</li>
        @empty
            <li><em>Belum ada asesmen</em></li>
        @endforelse
    </ul>

    <a href="{{ route('tema-rpm.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>
</body>
</html>
