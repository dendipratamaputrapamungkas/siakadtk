@extends('adminlte::page')

@section('title', 'Data Guru')

@section('content_header')
    <h1>Data Guru</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('guru.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Guru
            </a>
        </div>
        <div class="card-body">
            <table id="guru-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>No HP</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Kelas</th>
                        <th>Rombel</th>
                        <th>Status</th>
                        <th>Jenis GTK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('js')
    {{-- jQuery (wajib sebelum DataTables) --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    {{-- Bootstrap 5 CSS DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script>
        $(function() {
            $('#guru-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('guru.data') }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nama', name: 'nama' },
                    { data: 'nip', name: 'nip' },
                    { data: 'jabatan', name: 'jabatan' },
                    { data: 'no_hp', name: 'no_hp' },
                    { data: 'tempatlhr', name: 'tempatlhr' },
                    { data: 'tgl_lhr', name: 'tgl_lhr' },
                    { data: 'kelas', name: 'kelas' },
                    { data: 'rombel', name: 'rombel' },
                    { data: 'status', name: 'status' },
                    { data: 'jenisgtk', name: 'jenisgtk' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
                ],
                responsive: true,
                language: {
                    processing: "Loading...",
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "›",
                        previous: "‹"
                    }
                }
            });
        });
    </script>
@stop
