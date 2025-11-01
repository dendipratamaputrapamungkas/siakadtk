@extends('adminlte::app')

@section('content')
<div class="container">
    <h4 class="mb-4">Input Absensi Siswa</h4>

    <form action="{{ route('absensi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kelas_id" class="form-label">Pilih Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div id="data-siswa" class="mt-4"></div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Absensi</button>
    </form>
</div>

<script>
    document.getElementById('kelas_id').addEventListener('change', function () {
        const kelasId = this.value;
        if (!kelasId) return;

        fetch(`/api/siswa/by-kelas/${kelasId}`)
            .then(res => res.json())
            .then(data => {
                let html = `<table class="table table-bordered mt-3">
                    <thead><tr><th>Nama Siswa</th><th>Status</th><th>Keterangan</th></tr></thead><tbody>`;
                data.forEach(s => {
                    html += `
                    <tr>
                        <td>${s.nama_lengkap}</td>
                        <td>
                            <select name="status[${s.id}]" class="form-control">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                        <td><input type="text" name="keterangan[${s.id}]" class="form-control" placeholder="Opsional"></td>
                    </tr>`;
                });
                html += `</tbody></table>`;
                document.getElementById('data-siswa').innerHTML = html;
            });
    });
</script>
@endsection
