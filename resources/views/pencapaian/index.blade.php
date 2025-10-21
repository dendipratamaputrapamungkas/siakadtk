@extends('adminlte::page')

@section('title', 'Pencapaian Mingguan')

@section('content_header')
    <h1>Pencapaian Mingguan</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('pencapaian.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="pencapaianTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Minggu Ke</th>
                    <th>Motorik</th>
                    <th>Kognitif</th>
                    <th>Sosial</th>
                    <th>Bahasa</th>
                    <th>Agama</th>
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
    $('#pencapaianTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('pencapaian.index') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'siswa.nama_lengkap', name: 'siswa.nama_lengkap' },
            { data: 'minggu_ke', name: 'minggu_ke' },
            { data: 'aspek_motorik', name: 'aspek_motorik' },
            { data: 'aspek_kognitif', name: 'aspek_kognitif' },
            { data: 'aspek_sosial', name: 'aspek_sosial' },
            { data: 'aspek_bahasa', name: 'aspek_bahasa' },
            { data: 'aspek_agama', name: 'aspek_agama' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });
});
</script>
@stop
