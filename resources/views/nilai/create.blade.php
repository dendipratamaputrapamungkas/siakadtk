@extends('adminlte::page')

@section('title', 'Tambah Nilai')

@section('content')
<div class="container">
    <h4 class="mb-4">Input Nilai - {{ $tema->tema }}</h4>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <input type="hidden" name="tema_r_p_m_s_id" value="{{ $tema->id }}">

        <div class="mb-3">
            <label for="siswa_id">Pilih Siswa</label>
            <select name="siswa_id" class="form-control" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach($siswas as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <h5 class="mt-4">Langkah Pembelajaran</h5>
        <hr>

        @foreach($langkahs as $langkah)
            <div class="card mb-3">
                <div class="card-body">
                    <h6>{{ ucfirst($langkah->tahap) }}</h6>
                    <p>{{ $langkah->isi }}</p>

                    <div class="row">
                        <div class="col-md-3">
                            <label>Kategori Nilai</label>
                            <select name="nilai[{{ $langkah->id }}][kategori_nilai]" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="BB">BB (Belum Berkembang)</option>
                                <option value="MB">MB (Mulai Berkembang)</option>
                                <option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                                <option value="BSB">BSB (Berkembang Sangat Baik)</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <label>Deskripsi</label>
                            <textarea name="nilai[{{ $langkah->id }}][deskripsi]" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
    </form>
</div>
@endsection
