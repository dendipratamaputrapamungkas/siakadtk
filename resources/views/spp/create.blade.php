@extends('adminlte::page')

@section('title', 'Tambah Pembayaran SPP')

@section('content_header')
    <h1>Tambah Pembayaran SPP</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('spp.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="siswa_id">Nama Siswa</label>
                <select name="siswa_id" id="siswa_id" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswas as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Bulan</label>
                <select name="bulan" class="form-control" required>
                    <option value="">-- Pilih Bulan --</option>
                    @foreach ([
                        'Januari','Februari','Maret','April','Mei','Juni',
                        'Juli','Agustus','September','Oktober','November','Desember'
                    ] as $bulan)
                        <option value="{{ $bulan }}">{{ $bulan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" value="{{ date('Y') }}" required>
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Masukkan nominal SPP" required>
            </div>

            <div class="form-group">
                <label>Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" class="form-control">
            </div>

            <div class="form-group">
                <label>Status Pembayaran</label>
                <select name="status" class="form-control" required>
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('spp.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop
