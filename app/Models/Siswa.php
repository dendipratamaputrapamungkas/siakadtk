<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    use HasFactory;

    protected $table = "siswa";
    protected $guarded = ["id"];
    protected $fillable = [
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
        'no_hp',
        ];
    public function kelas()
    {
    return $this->belongsTo(Kelas::class);
    }

    public function rombel()
    {
    return $this->belongsTo(Rombel::class);
    }



}
