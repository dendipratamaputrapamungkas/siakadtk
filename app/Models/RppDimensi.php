<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RppDimensi extends Model
{
    protected $table = 'rpp_dimensi';

    protected $fillable = ['rpp_id','dimensi'];

    public function rpp()
    {
        return $this->belongsTo(TemaRPM::class, 'rpp_id');
    }
}
