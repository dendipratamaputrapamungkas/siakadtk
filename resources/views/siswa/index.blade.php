@extends('adminlte::page')

@section('title', 'Data Siswa')

@section('content_header')
    <h1>Data Siswa</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form method="GET" action="{{ route('siswa.index') }}" class="form-inline">
            <div class="input-group">
                <input type="search" name="q" class="form-control" placeholder="Cari NIS atau Nama" value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>   
            </div>
            <div>
                <a href="{{ route('siswa.create') }}" class="btn btn-success ml-2">Tambah Siswa</a>
                <a href="{{ route('siswa.export') }}" class="btn btn-success">Export Excel</a>
                <a href="{{ route('siswa.exportPdf') }}" class="btn btn-danger mb-3">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
                <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-file-import"></i> Import Excel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="width:120px">NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>JK</th>
                    <th>Wali</th>
                    <th>No HP</th>
                    <th style="width:160px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $s)
                    <tr>
                        <td>{{ $s->nis }}</td>
                        <td>{{ $s->nama_lengkap }}</td>
                        <td>{{ $s->tempatlahir }}</td>
                        <td>{{ $s->tanggal_lhr ? $s->tanggal_lhr->format('Y-m-d') : '-' }}</td>
                        <td>{{ $s->jk }}</td>
                        <td>{{ $s->wali }}</td>
                        <td>{{ $s->no_hp }}</td>
                        <td>
                            <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-left">
            Menampilkan {{ $siswa->firstItem() ?? 0 }} - {{ $siswa->lastItem() ?? 0 }} dari {{ $siswa->total() }} data
        </div>
        <div class="float-right">
            {{ $siswa->links() }}
        </div>
    </div>
</div>
@stop
