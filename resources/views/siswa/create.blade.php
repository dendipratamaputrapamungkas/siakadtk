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
                <label>NISN</label>
                <input type="text" name="nisn" class="form-control"  value="{{ old('nis') }}">
                @error('nisn')
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
                <label>NO KK</label>
                <input type="text" name="no_kk" class="form-control"  value="{{ old('no_kk') }}">
                    @error('no_kk')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempatlhr" class="form-control"  value="{{ old('tempatlhr') }}">
                    @error('tempatlhr')
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
                <label>Agama</label>
                <select name="agama" class="form-control" >
                    <option value="ISLAM" {{ old('agama') == 'ISLAM' ? 'selected' : '' }}>ISLAM</option>
                    <option value="KRISTEN" {{ old('agama') == 'KRISTEN' ? 'selected' : '' }}>KRISTEN</option>
                    <option value="KHATOLIK" {{ old('agama') == 'KHATOLIK' ? 'selected' : '' }}>KHATOLIK</option>
                    <option value="HINDU" {{ old('agama') == 'HINDU' ? 'selected' : '' }}>HINDU</option>
                    <option value="BUDHA" {{ old('agama') == 'BUDHA' ? 'selected' : '' }}>BUDHA</option>
                    <option value="KHONGHUCU" {{ old('agama') == 'KHONGHUCU' ? 'selected' : '' }}>KHONGHUCU</option>
                </select>
                    @error('agama')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label>Kelas</label>
               <select name="kelas_id" class="form-control">
                    @foreach($kelas as $item)
                        <option value="{{$item->id}}" {{old('kelas') == $item->id ?'selected' : ''}}>{{$item->kelas}}</option>
                    @endforeach
               </select>
                @error('kelas_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Rombongan Belajar</label>
               <select name="rombel_id" class="form-control">
                    @foreach($rombel as $item)
                        <option value="{{$item->id}}"{{old('kelas') == $item->id ?'selected' : ''}}>{{$item->nama}}</option>
                    @endforeach
               </select>
                @error('rombel_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>No Induk Peserta Didik</label>
                <textarea name="no_indukpd" class="form-control">{{ old('no_indukpd') }}</textarea>
                @error('no_indukpd')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tgl_masuk" class="form-control"  value="{{ old('tgl_masuk') }}">
                    @error('tgl_masuk')
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
                <label>Nama Ayah</label>
                <textarea name="nama_ayah" class="form-control">{{ old('nama_ayah') }}</textarea>
                @error('nama_ayah')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu') }}">
                    @error('nama_ibu')
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
