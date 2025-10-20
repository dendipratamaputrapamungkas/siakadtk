@extends('adminlte::page')

@section('title', 'Edit Data Guru')

@section('content_header')
    <h1>Edit Data Guru</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input 
                        type="text" 
                        name="nama" 
                        id="nama" 
                        class="form-control" 
                        value="{{ old('nama', $guru->nama) }}" 
                        required>
                </div>

                <div class="form-group mb-3">
                    <label for="nip">NIP</label>
                    <input 
                        type="text" 
                        name="nip" 
                        id="nip" 
                        class="form-control" 
                        value="{{ old('nip', $guru->nip) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="jabatan">Jabatan</label>
                    <input 
                        type="text" 
                        name="jabatan" 
                        id="jabatan" 
                        class="form-control" 
                        value="{{ old('jabatan', $guru->jabatan) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="no_hp">No HP</label>
                    <input 
                        type="text" 
                        name="no_hp" 
                        id="no_hp" 
                        class="form-control" 
                        value="{{ old('no_hp', $guru->no_hp) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea 
                        name="alamat" 
                        id="alamat" 
                        class="form-control">{{ old('alamat', $guru->alamat) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Perbarui
                </button>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@stop
