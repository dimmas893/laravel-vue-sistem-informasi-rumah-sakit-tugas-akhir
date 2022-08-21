<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $guarded = [] ;
     public function pasien()
    {
        return $this->hasMany('App\Pasien');
    }
}
