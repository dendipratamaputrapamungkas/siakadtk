@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
    <h1>Edit Data Siswa</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>NISN</label>
                    <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $siswa->nama_lengkap }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempatlhr" class="form-control" value="{{ $siswa->tempatlhr }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lhr" class="form-control" value="{{ $siswa->tanggal_lhr }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                        <option value="L" {{ $siswa->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $siswa->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Agama</label>
                    <select name="agama" class="form-control">
                        @foreach(['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
                            <option value="{{ $agama }}" {{ $siswa->agama == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Kelas</label>
                    <select name="kelas_id" class="form-control">
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Rombel</label>
                    <select name="rombel_id" class="form-control">
                        @foreach($rombel as $r)
                            <option value="{{ $r->id }}" {{ $siswa->rombel_id == $r->id ? 'selected' : '' }}>{{ $r->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control">{{ $siswa->alamat }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" value="{{ $siswa->nama_ayah }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" value="{{ $siswa->nama_ibu }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Wali</label>
                    <input type="text" name="wali" class="form-control" value="{{ $siswa->wali }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $siswa->no_hp }}">
                </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop
