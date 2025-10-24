<!-- resources/views/tema_rpm/index.blade.php -->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>List Tema RPM</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- DataTables CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3>Tema RPM</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tema-rpm.create') }}" class="btn btn-primary mb-3">Tambah RPP</a>

    <table class="table table-bordered" id="tema-rpm-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelompok</th>
                <th>Tema</th>
                <th>Dimensi (count)</th>
                <th>Tujuan (count)</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script>
    $(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $('#tema-rpm-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("tema-rpm.data") }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
                { data: 'kelompok', name: 'kelompok' },
                { data: 'tema', name: 'tema' },
                { data: 'dimensi_count', name: 'dimensi_count', orderable:false, searchable:false },
                { data: 'tujuan_count', name: 'tujuan_count', orderable:false, searchable:false },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'action', name: 'action', orderable:false, searchable:false },
            ],
            order: [[5,'desc']]
        });
    });
</script>
</body>
</html>

