@extends('adminlte::page')

@section('title', 'Data Siswa')

@section('content_header')
    <h1>Data Siswa</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
        <a href="{{ route('siswa.export') }}" class="btn btn-success">Export Excel</a>
        <a href="{{ route('siswa.exportPdf') }}" class="btn btn-danger">Export PDF</a>
        <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
            @csrf
            <input type="file" name="file" required>
            <button type="submit" class="btn btn-info">Import Excel</button>
        </form>
    </div>

    <div class="card-body">
        <table id="siswa-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>JK</th>
                    <th>Wali</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@stop

@section('js')
<script>
$(function() {
    $('#siswa-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('siswa.data') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nis', name: 'nis' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'tempatlahir', name: 'tempatlahir' },
            { data: 'tanggal_lhr', name: 'tanggal_lhr' },
            { data: 'jk', name: 'jk' },
            { data: 'wali', name: 'wali' },
            { data: 'no_hp', name: 'no_hp' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
        ]
    });
});
</script>
@stop
