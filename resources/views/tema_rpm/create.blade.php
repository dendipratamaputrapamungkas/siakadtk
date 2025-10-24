<!-- resources/views/tema_rpm/create.blade.php -->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah RPP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah RPP (TemaRPM)</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tema-rpm.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Kelompok</label>
            <input type="text" name="kelompok" class="form-control" value="{{ old('kelompok') }}" required>
        </div>

        <div class="form-group">
            <label>Tema</label>
            <input type="text" name="tema" class="form-control" value="{{ old('tema') }}" required>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
        </div>

        <hr>
        <h5>Dimensi (1 baris = 1 dimensi)</h5>
        <div class="form-group">
            <textarea name="dimensi" rows="4" class="form-control" placeholder="Satu baris = satu dimensi...">{{ old('dimensi') }}</textarea>
        </div>

        <h5>Tujuan Pembelajaran (1 baris = 1 tujuan)</h5>
        <div class="form-group">
            <textarea name="tujuan" rows="4" class="form-control" placeholder="Satu baris = satu tujuan...">{{ old('tujuan') }}</textarea>
        </div>

        <h5>Langkah - Pendahuluan (1 baris = 1 langkah)</h5>
        <div class="form-group">
            <textarea name="pendahuluan" rows="4" class="form-control" placeholder="Baris per langkah pendahuluan...">{{ old('pendahuluan') }}</textarea>
        </div>

        <h5>Langkah - Inti (1 baris = 1 langkah)</h5>
        <div class="form-group">
            <textarea name="inti" rows="4" class="form-control" placeholder="Baris per langkah inti...">{{ old('inti') }}</textarea>
        </div>

        <h5>Langkah - Penutup (1 baris = 1 langkah)</h5>
        <div class="form-group">
            <textarea name="penutup" rows="4" class="form-control" placeholder="Baris per langkah penutup...">{{ old('penutup') }}</textarea>
        </div>

        <h5>Asesmen (1 baris = 1 jenis asesmen)</h5>
        <div class="form-group">
            <textarea name="asesmen" rows="3" class="form-control" placeholder="Observasi ceklis&#10;Dokumentasi&#10;Anekdot">{{ old('asesmen') }}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="{{ route('tema-rpm.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
