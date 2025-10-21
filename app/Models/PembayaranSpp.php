<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranSpp extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_spp';

    protected $fillable = [
        'siswa_id',
        'bulan',
        'tahun',
        'jumlah',
        'tanggal_bayar',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}