<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RppLangkah extends Model
{
    protected $table = 'rpp_langkah';

    protected $fillable = ['rpp_id','tahap','isi'];

    public function rpp()
    {
        return $this->belongsTo(TemaRPM::class, 'rpp_id');
    }
}
