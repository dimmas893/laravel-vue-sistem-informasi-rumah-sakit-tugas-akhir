<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $guarded = [] ;
    public function pasien()
    {
        return $this->hasMany('App\Pasien');
    }
}
