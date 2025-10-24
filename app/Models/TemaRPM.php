<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class TemaRPM extends Model
// {
//     //

// }

class TemaRPM extends Model
{
    protected $table = 'tema_r_p_m_s';

    protected $fillable = [
        'kelompok',
        'tema',
        'tanggal',
    ];

    public function dimensi()
    {
        return $this->hasMany(RppDimensi::class, 'rpp_id');
    }

    public function tujuan()
    {
        return $this->hasMany(RppTujuan::class, 'rpp_id');
    }

    public function langkah()
    {
        return $this->hasMany(RppLangkah::class, 'rpp_id');
    }

    public function asesmen()
    {
        return $this->hasMany(RppAsesmen::class, 'rpp_id');
    }
}
