<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RppAsesmen extends Model
{
    protected $table = 'rpp_asesmen';

    protected $fillable = ['rpp_id','jenis'];

    public function rpp()
    {
        return $this->belongsTo(TemaRPM::class, 'rpp_id');
    }
}
