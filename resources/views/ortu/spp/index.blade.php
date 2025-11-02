@extends('adminlte::app')

@section('content')
<div class="container">
    <h3 class="mb-4">Pembayaran SPP - {{ $siswa->nama_lengkap }}</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Bukti Bayar</th>
                <th>Status Validasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $row)
                <tr>
                    <td>{{ $row->bulan }}</td>
                    <td>{{ $row->tahun }}</td>
                    <td>Rp {{ number_format($row->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $row->status }}</td>
                    <td>
                        @if ($row->bukti_bayar)
                            <a href="{{ asset('uploads/bukti_spp/'.$row->bukti_bayar) }}" target="_blank">
                                <img src="{{ asset('uploads/bukti_spp/'.$row->bukti_bayar) }}" width="70">
                            </a>
                        @else
                            <span class="text-muted">Belum ada</span>
                        @endif
                    </td>
                    <td>
                        @if ($row->status_validasi == 'Disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif ($row->status_validasi == 'Ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @endif
                    </td>
                    <td>
                        @if (!$row->bukti_bayar)
                            <form action="{{ route('ortu.spp.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="pembayaran_id" value="{{ $row->id }}">
                                <input type="file" name="bukti_bayar" class="form-control mb-2" required>
                                <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                            </form>
                        @else
                            <small class="text-muted">Sudah diupload</small>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
