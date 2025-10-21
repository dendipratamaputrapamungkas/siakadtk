@extends('adminlte::page')

@section('title', 'Edit Pembayaran SPP')

@section('content_header')
    <h1>Edit Pembayaran SPP</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('spp.update', $pembayaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Siswa</label>
                <select name="siswa_id" class="form-control" required>
                    @foreach ($siswas as $s)
                        <option value="{{ $s->id }}" {{ $pembayaran->siswa_id == $s->id ? 'selected' : '' }}>
                            {{ $s->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Bulan</label>
                <select name="bulan" class="form-control" required>
                    @foreach ([
                        'Januari','Februari','Maret','April','Mei','Juni',
                        'Juli','Agustus','September','Oktober','November','Desember'
                    ] as $bulan)
                        <option value="{{ $bulan }}" {{ $pembayaran->bulan == $bulan ? 'selected' : '' }}>
                            {{ $bulan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" value="{{ $pembayaran->tahun }}" required>
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="{{ $pembayaran->jumlah }}" required>
            </div>

            <div class="form-group">
                <label>Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" class="form-control" value="{{ $pembayaran->tanggal_bayar }}">
            </div>

            <div class="form-group">
                <label>Status Pembayaran</label>
                <select name="status" class="form-control" required>
                    <option value="Lunas" {{ $pembayaran->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="Belum Lunas" {{ $pembayaran->status == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('spp.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop
