@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1>Tambah Siswa</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('siswa.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control">
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control">
            </div>

            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control">
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jk" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Nama Wali</label>
                <input type="text" name="wali" class="form-control">
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control">
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

@stop
