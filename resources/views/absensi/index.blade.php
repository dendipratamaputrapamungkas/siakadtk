@extends('adminlte::page')

@section('title', 'Data Absensi')

@section('content_header')
    <h1>Data Absensi Siswa</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <form method="GET" action="{{ route('absensi.index') }}" class="form-inline">
                <label for="kelas_id" class="mr-2">Pilih Kelas:</label>
                <select name="kelas_id" id="kelas_id" class="form-control mr-2" style="width:200px;">
                    <option value="">-- Semua Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ $kelas_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Tampilkan</button>
                <a href="{{ route('absensi.create') }}" class="btn btn-success ml-2">
                    <i class="fas fa-plus"></i> Input Absensi
                </a>
            </form>
        </div>

        <div class="card-body">
            @if(!$kelas_id)
                <div class="alert alert-info">
                    Silakan pilih kelas terlebih dahulu untuk melihat data absensi.
                </div>
            @elseif($absensis->isEmpty())
                <div class="alert alert-warning">
                    Belum ada data absensi untuk kelas ini.
                </div>
            @else
                @foreach($absensis as $tanggal => $daftarAbsensi)
                    <h5 class="mt-3"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($tanggal)->format('d M Y') }}</h5>
                    <table class="table table-bordered table-striped mt-2">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftarAbsensi as $index => $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->siswa->nama_lengkap ?? '-' }}</td>
                                    <td>
                                        @switch($a->status)
                                            @case('hadir')
                                                <span class="badge bg-success">Hadir</span>
                                                @break
                                            @case('izin')
                                                <span class="badge bg-warning text-dark">Izin</span>
                                                @break
                                            @case('sakit')
                                                <span class="badge bg-info text-dark">Sakit</span>
                                                @break
                                            @case('alpha')
                                                <span class="badge bg-danger">Alpha</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{ $a->keterangan ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            @endif
        </div>
    </div>
@stop
