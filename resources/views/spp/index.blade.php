@extends('adminlte::page')

@section('title', 'Pembayaran SPP')

@section('content_header')
    <h1>Pembayaran SPP</h1>
@stop

@section('content')
    <a href="{{ route('spp.create') }}" class="btn btn-primary mb-3">+ Tambah Pembayaran</a>
    <a href="{{ route('spp.export') }}" class="btn btn-success mb-3">
        <i class="fas fa-file-excel"></i> Export Excel
    </a>
    <table class="table table-bordered" id="table-pembayaran">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
@stop

@section('js')
<script>
$(function() {
    $('#table-pembayaran').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('spp.index') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_siswa', name: 'siswa.nama_lengkap' },
            { data: 'bulan', name: 'bulan' },
            { data: 'tahun', name: 'tahun' },
            { data: 'jumlah', name: 'jumlah' },
            { data: 'tanggal_bayar', name: 'tanggal_bayar' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
        ->addColumn('validasi', function ($row) {
    if ($row->status_validasi == 'Menunggu') {
        return '
            <form method="POST" action="'.route('spp.validasi', $row->id).'">
                '.csrf_field().'
                <button name="aksi" value="Disetujui" class="btn btn-success btn-sm">Setujui</button>
                <button name="aksi" value="Ditolak" class="btn btn-danger btn-sm">Tolak</button>
            </form>
        ';
    }
    return '<span class="badge bg-'.($row->status_validasi == 'Disetujui' ? 'success' : 'danger').'">'.$row->status_validasi.'</span>';
})

    });
});
</script>
@stop
