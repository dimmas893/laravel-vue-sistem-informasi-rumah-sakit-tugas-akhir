<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $guarded = [] ;
    public function dokter()
    {
        return $this->belongsTo('App\Dokter');
    }

    public function obat()
    {
        return $this->belongsTo('App\Obat');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }
}
