<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftarans extends Model
{
    //
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'email',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'alamat',
        'asal_sekolah',
        'status',
    ];
}
