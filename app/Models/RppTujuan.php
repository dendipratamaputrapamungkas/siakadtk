<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RppTujuan extends Model
{
    protected $table = 'rpp_tujuan';

    protected $fillable = ['rpp_id','tujuan'];

    public function rpp()
    {
        return $this->belongsTo(TemaRPM::class, 'rpp_id');
    }
}
