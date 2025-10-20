<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        return new Siswa([
            'nis'           => $row[0],
            'nama_lengkap'  => $row[1],
            'tempatlahir'   => $row[2],
            'tanggal_lhr'   => $row[3],
            'jk'            => $row[4],
            'alamat'        => $row[5],
            'wali'          => $row[6],
            'no_hp'         => $row[7],
        ]);
    }
}
