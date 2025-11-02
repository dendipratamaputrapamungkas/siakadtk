<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
    
        if (empty($row['nisn'])) {
            return null;
        }

        return new Siswa([
            'nisn'         => $row['nisn'],
            'nama_lengkap' => $row['nama_lengkap'],
            'no_kk'        => $row['no_kk'],
            'tempatlhr'    => $row['tempatlhr'],
            'tanggal_lhr'  => $row['tanggal_lhr'],
            'jk'           => $row['jk'],
            'agama'        => $row['agama'],
            'kelas_id'     => $row['kelas_id'],
            'rombel_id'    => $row['rombel_id'],
            'no_indukpd'   => $row['no_indukpd'],
            'tgl_masuk'    => $row['tgl_masuk'],
            'alamat'       => $row['alamat'],
            'nama_ayah'    => $row['nama_ayah'],
            'nama_ibu'     => $row['nama_ibu'],
            'wali'         => $row['wali'],
            'no_hp'        => $row['no_hp'],
        ]);
    }
}
