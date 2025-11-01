<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $guarded = ['id'];

    public function getAllData()
    {
        return $this->all();
    }
}
