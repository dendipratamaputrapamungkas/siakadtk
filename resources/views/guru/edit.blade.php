@extends('adminlte::page')

@section('title', 'Edit Guru')

@section('content_header')
    <h1>Edit Data Guru</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" 
                                   value="{{ old('nama', $guru->nama) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" 
                                   value="{{ old('nip', $guru->nip) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control" 
                                   value="{{ old('jabatan', $guru->jabatan) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" 
                                   value="{{ old('no_hp', $guru->no_hp) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tenpatlhr">Tempat Lahir</label>
                            <input type="text" name="tenpatlhr" id="tenpatlhr" class="form-control" 
                                   value="{{ old('tenpatlhr', $guru->tenpatlhr) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tgl_lhr">Tanggal Lahir</label>
                            <input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control" 
                                   value="{{ old('tgl_lhr', $guru->tgl_lhr) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="ibu_kandung">Ibu Kandung</label>
                            <input type="text" name="ibu_kandung" id="ibu_kandung" class="form-control" 
                                   value="{{ old('ibu_kandung', $guru->ibu_kandung) }}">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Pilih Status --</option>
                                <option value="PNS" {{ $guru->status == 'PNS' ? 'selected' : '' }}>PNS</option>
                                <option value="Honorer" {{ $guru->status == 'Honorer' ? 'selected' : '' }}>Honorer</option>
                                <option value="Kontrak" {{ $guru->status == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenisgtk">Jenis GTK</label>
                            <input type="text" name="jenisgtk" id="jenisgtk" class="form-control" 
                                   value="{{ old('jenisgtk', $guru->jenisgtk) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $guru->kelas_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="rombel_id">Rombel</label>
                            <select name="rombel_id" id="rombel_id" class="form-control" required>
                                <option value="">-- Pilih Rombel --</option>
                                @foreach($rombels as $r)
                                    <option value="{{ $r->id }}" {{ $guru->rombel_id == $r->id ? 'selected' : '' }}>
                                        {{ $r->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tingkatpd">Tingkat PD</label>
                            <input type="text" name="tingkatpd" id="tingkatpd" class="form-control" 
                                   value="{{ old('tingkatpd', $guru->tingkatpd) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kurikulum">Kurikulum</label>
                            <input type="text" name="kurikulum" id="kurikulum" class="form-control" 
                                   value="{{ old('kurikulum', $guru->kurikulum) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="walikelas">Wali Kelas</label>
                            <input type="text" name="walikelas" id="walikelas" class="form-control" 
                                   value="{{ old('walikelas', $guru->walikelas) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="ruangan">Ruangan</label>
                            <input type="text" name="ruangan" id="ruangan" class="form-control" 
                                   value="{{ old('ruangan', $guru->ruangan) }}">
                        </div>

                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@stop
