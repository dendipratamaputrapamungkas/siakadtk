<?php
namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Ambil kolom sesuai model lo
        return Siswa::select(
            'nis',
            'nama_lengkap',
            'tempatlahir',
            'tanggal_lhr',
            'jk',
            'alamat',
            'wali',
            'no_hp'
        )->get();
    }

    public function headings(): array
    {
        // Judul kolom di Excel
        return [
            'NIS',
            'Nama Lengkap',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Nama Wali',
            'No. HP',
        ];
    }
}
