<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = ['name', 'gambar', 'address', 'spesialis', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin'];
}
