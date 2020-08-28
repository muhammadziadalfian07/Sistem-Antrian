<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = ['no_antrian', 'status'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
