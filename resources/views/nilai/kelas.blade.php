@extends('adminlte::page')

@section('title', 'Nilai Kelas')

@section('content')
<div class="container">
    <h4 class="mb-4">Tema Pembelajaran - Kelas {{ $kelas->nama_kelas }}</h4>

    @if($temas->isEmpty())
        <div class="alert alert-warning">Belum ada tema pembelajaran untuk kelas ini.</div>
    @else
        <div class="row">
            @foreach($temas as $tema)
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5>{{ $tema->nama }} - {{ $tema->tema }}</h5>
                            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($tema->tanggal)->format('d M Y') }}</p>
                            <a href="{{ route('nilai.create', $tema->id) }}" class="btn btn-success">
                                Input Nilai
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('nilai.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kelas</a>
</div>
@endsection
