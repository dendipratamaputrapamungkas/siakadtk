<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Siswa::select(
            'nisn',
            'nama_lengkap',
            'no_kk',
            'tempatlhr',
            'tanggal_lhr',
            'jk',
            'agama',
            'kelas_id',
            'rombel_id',
            'no_indukpd',
            'tgl_masuk',
            'alamat',
            'nama_ayah',
            'nama_ibu',
            'wali',
            'no_hp'
        )->get();
    }

    public function headings(): array
    {
        return [
            'NISN',
            'Nama Lengkap',
            'No KK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Kelas ID',
            'Rombel ID',
            'No Induk PD',
            'Tanggal Masuk',
            'Alamat',
            'Nama Ayah',
            'Nama Ibu',
            'Wali',
            'No HP',
        ];
    }
}
