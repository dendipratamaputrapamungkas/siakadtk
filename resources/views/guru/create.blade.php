@extends('adminlte::page')

@section('title', 'Tambah Guru')

@section('content_header')
    <h1>Tambah Guru</h1>
@stop
    
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('guru.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tenpatlhr">Tempat Lahir</label>
                            <input type="text" name="tenpatlhr" id="tenpatlhr" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tgl_lhr">Tanggal Lahir</label>
                            <input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="ibu_kandung">Ibu Kandung</label>
                            <input type="text" name="ibu_kandung" id="ibu_kandung" class="form-control">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Pilih Status --</option>
                                <option value="PNS">PNS</option>
                                <option value="Honorer">Honorer</option>
                                <option value="Kontrak">Kontrak</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenisgtk">Jenis GTK</label>
                            <input type="text" name="jenisgtk" id="jenisgtk" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="rombel_id">Rombel</label>
                            <select name="rombel_id" id="rombel_id" class="form-control" required>
                                <option value="">-- Pilih Rombel --</option>
                                @foreach($rombels as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tingkatpd">Tingkat PD</label>
                            <input type="text" name="tingkatpd" id="tingkatpd" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kurikulum">Kurikulum</label>
                            <input type="text" name="kurikulum" id="kurikulum" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="walikelas">Wali Kelas</label>
                            <input type="text" name="walikelas" id="walikelas" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="ruangan">Ruangan</label>
                            <input type="text" name="ruangan" id="ruangan" class="form-control">
                        </div>

                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@stop
