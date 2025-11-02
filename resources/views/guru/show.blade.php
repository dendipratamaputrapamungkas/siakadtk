@extends('adminlte::page')

@section('title', 'Detail Guru')

@section('content_header')
    <h1>Detail Data Guru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>Nama</th>
                <td>{{ $guru->nama }}</td>
            </tr>
            <tr>
                <th>NIP</th>
                <td>{{ $guru->nip }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $guru->jabatan }}</td>
            </tr>
            <tr>
                <th>No HP</th>
                <td>{{ $guru->no_hp }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $guru->tempatlhr }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $guru->tgl_lhr }}</td>
            </tr>
            <tr>
                <th>Ibu Kandung</th>
                <td>{{ $guru->ibu_kandung }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $guru->status }}</td>
            </tr>
            <tr>
                <th>Jenis GTK</th>
                <td>{{ $guru->jenisgtk }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $guru->kelas->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Rombel</th>
                <td>{{ $guru->rombel->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tingkat PD</th>
                <td>{{ $guru->tingkatpd }}</td>
            </tr>
            <tr>
                <th>Kurikulum</th>
                <td>{{ $guru->kurikulum }}</td>
            </tr>
            <tr>
                <th>Wali Kelas</th>
                <td>{{ $guru->walikelas }}</td>
            </tr>
            <tr>
                <th>Ruangan</th>
                <td>{{ $guru->ruangan }}</td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@stop
