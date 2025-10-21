<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencapaianMingguan extends Model
{
    use HasFactory;

    protected $table = 'pencapaian_mingguan';

    protected $fillable = [
        'siswa_id',
        'minggu_ke',
        'aspek_motorik',
        'aspek_kognitif',
        'aspek_sosial',
        'aspek_bahasa',
        'aspek_agama',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}