@extends('adminlte::page')

@section('title', 'Data Guru')

@section('content_header')
    <h1>Data Guru</h1>
@stop

@section('content')
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Guru
    </a>

    <div class="card">
        <div class="card-body">
            <table id="guru-table" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>No HP</th>
                        <th>Kelas</th>
                        <th>Rombel</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

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
                    { data: 'kelas', name: 'kelas.nama' },
                    { data: 'rombel', name: 'rombel.nama' },
                    { data: 'status', name: 'status' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@stop
