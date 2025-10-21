@extends('adminlte::page')

@section('title', 'Tambah Pencapaian Mingguan')

@section('content_header')
    <h1>Tambah Pencapaian Mingguan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('pencapaian.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="siswa_id">Nama Siswa</label>
                <select name="siswa_id" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="minggu_ke">Minggu Ke</label>
                <input type="text" name="minggu_ke" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Aspek Motorik</label>
                    <textarea name="aspek_motorik" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                    <label>Aspek Kognitif</label>
                    <textarea name="aspek_kognitif" class="form-control"></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label>Aspek Sosial</label>
                    <textarea name="aspek_sosial" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                    <label>Aspek Bahasa</label>
                    <textarea name="aspek_bahasa" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group mt-3">
                <label>Aspek Agama</label>
                <textarea name="aspek_agama" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
        </form>
    </div>
</div>
@stop
