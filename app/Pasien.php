<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['name', 'address', 'keluhan', 'antrian_id', 'jamkes_id', 'dokter_id'];

    public function dokter()
    {
        return $this->belongsTo('App\Dokter');
    }

    public function jamkes()
    {
        return $this->belongsTo('App\Jamkes');
    }

    public function antrian()
    {
        return $this->belongsTo('App\Antrian');
    }
}
