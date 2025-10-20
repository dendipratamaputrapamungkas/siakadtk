<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    use HasFactory;

    protected $table = 'siswas';
    public $timestamps = false;
    protected $fillable = [
        'nis',
        'nama_lengkap',
        'tempatlahir',
        'tanggal_lhr',
        'jk',
        'alamat',
        'wali',
        'no_hp',

    ];
}
