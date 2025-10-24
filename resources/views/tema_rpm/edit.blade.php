<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Tema RPM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <h3>Edit Tema RPM</h3>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tema-rpm.update', $rpp->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Kelompok</label>
            <input type="text" name="kelompok" class="form-control"
                   value="{{ old('kelompok', $rpp->kelompok) }}" required>
        </div>

        <div class="form-group">
            <label>Tema</label>
            <input type="text" name="tema" class="form-control"
                   value="{{ old('tema', $rpp->tema) }}" required>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                   value="{{ old('tanggal', $rpp->tanggal) }}" required>
        </div>

        <hr>
        <h5>Dimensi (1 baris = 1 dimensi)</h5>
        <textarea name="dimensi" rows="4" class="form-control">{{ old('dimensi', $dimensi_text) }}</textarea>

        <h5 class="mt-3">Tujuan (1 baris = 1 tujuan)</h5>
        <textarea name="tujuan" rows="4" class="form-control">{{ old('tujuan', $tujuan_text) }}</textarea>

        <h5 class="mt-3">Langkah Pendahuluan (1 baris = 1 langkah)</h5>
        <textarea name="pendahuluan" rows="4" class="form-control">{{ old('pendahuluan', $pendahuluan_text) }}</textarea>

        <h5 class="mt-3">Langkah Inti (1 baris = 1 langkah)</h5>
        <textarea name="inti" rows="4" class="form-control">{{ old('inti', $inti_text) }}</textarea>

        <h5 class="mt-3">Langkah Penutup (1 baris = 1 langkah)</h5>
        <textarea name="penutup" rows="4" class="form-control">{{ old('penutup', $penutup_text) }}</textarea>

        <h5 class="mt-3">Asesmen (1 baris = 1 asesmen)</h5>
        <textarea name="asesmen" rows="3" class="form-control">{{ old('asesmen', $asesmen_text) }}</textarea>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tema-rpm.index') }}" class="btn btn-secondary">Batal</a>
        </div>

    </form>

</div>
</body>
</html>
