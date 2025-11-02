@extends('adminlte::page')

@section('title', 'Detail Siswa')

@section('content_header')
    <h1>Detail Siswa</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr><th>NISN</th><td>{{ $siswa->nisn }}</td></tr>
            <tr><th>Nama Lengkap</th><td>{{ $siswa->nama_lengkap }}</td></tr>
            <tr><th>No KK</th><td>{{ $siswa->no_kk }}</td></tr>
            <tr><th>Tempat Lahir</th><td>{{ $siswa->tempatlhr }}</td></tr>
            <tr><th>Tanggal Lahir</th><td>{{ $siswa->tanggal_lhr }}</td></tr>
            <tr><th>Jenis Kelamin</th><td>{{ $siswa->jk }}</td></tr>
            <tr><th>Agama</th><td>{{ $siswa->agama }}</td></tr>
            <tr><th>Kelas</th><td>{{ $siswa->kelas->nama ?? '-' }}</td></tr>
            <tr><th>Rombel</th><td>{{ $siswa->rombel->nama ?? '-' }}</td></tr>
            <tr><th>No Induk PD</th><td>{{ $siswa->no_indukpd }}</td></tr>
            <tr><th>Tanggal Masuk</th><td>{{ $siswa->tgl_masuk }}</td></tr>
            <tr><th>Alamat</th><td>{{ $siswa->alamat }}</td></tr>
            <tr><th>Nama Ayah</th><td>{{ $siswa->nama_ayah }}</td></tr>
            <tr><th>Nama Ibu</th><td>{{ $siswa->nama_ibu }}</td></tr>
            <tr><th>Wali</th><td>{{ $siswa->wali }}</td></tr>
            <tr><th>No HP</th><td>{{ $siswa->no_hp }}</td></tr>
        </table>

        <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@stop
