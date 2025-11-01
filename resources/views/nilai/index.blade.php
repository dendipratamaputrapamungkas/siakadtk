@extends('adminlte::page')

@section('title', 'Nilai')

@section('content')
<div class="container">
    <h4 class="mb-4">Daftar Kelas - Input Nilai</h4>

    <div class="row">
        @foreach($kelass as $kelas)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>{{ $kelas->nama_kelas }}</h5>
                    <p>{{ $kelas->tingkat ?? '' }}</p>
                    <a href="{{ route('nilai.kelas', $kelas->id) }}" class="btn btn-primary">
                        Lihat Tema &rarr;
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
