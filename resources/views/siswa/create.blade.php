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
                <input type="text" name="nis" class="form-control"  value="{{ old('nis') }}">
                @error('nis')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control"  value="{{ old('nama_lengkap') }}">
                    @error('nama_lengkap')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempatlahir" class="form-control"  value="{{ old('tempatlahir') }}">
                    @error('tempatlahir')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lhr" class="form-control"  value="{{ old('tanggal_lhr') }}">
                    @error('tanggal_lhr')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jk" class="form-control" >
                    <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jk')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Wali</label>
                <input type="text" name="wali" class="form-control" value="{{ old('wali') }}">
                    @error('wali')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>

@stop
