<?php

namespace App\Exports;

use App\Models\PembayaranSpp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PembayaranSppExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return PembayaranSpp::with('siswa')->orderBy('tahun')->orderBy('bulan')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Bulan',
            'Tahun',
            'Jumlah',
            'Tanggal Bayar',
            'Status'
        ];
    }

    public function map($pembayaran): array
    {
        static $i = 1;
        return [
            $i++,
            $pembayaran->siswa->nama_lengkap ?? '-',
            $pembayaran->bulan,
            $pembayaran->tahun,
            number_format($pembayaran->jumlah, 0, ',', '.'),
            $pembayaran->tanggal_bayar ?? '-',
            $pembayaran->status,
        ];
    }
}
