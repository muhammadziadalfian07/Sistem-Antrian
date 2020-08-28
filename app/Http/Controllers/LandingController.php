<?php

namespace App\Http\Controllers;

use App\Antrian;
use App\Dokter;
use App\Jamkes;
use App\Pasien;

class LandingController extends Controller
{
    public function index()
    {
        //jumlah antrian
        $jumlah = Antrian::where('status', 0)->orderBy('created_at', 'DESC')->get();

        //menunggu
        $tunggu = Antrian::where('status', 0)->orderBy('created_at', 'ASC')->first();

        // antrian 
        $antrian = Antrian::where('status', 1)->orderBy('updated_at', 'DESC')->first();

        //dokter
        $dokter = Dokter::orderBy('created_at', 'DESC')->get();

        //daftar
        $jamkes = Jamkes::orderBy('created_at', 'DESC')->get();

        //pasien
        $pasien = Pasien::orderBy('created_at', 'DESC')->first();

        return view('welcome', compact('antrian', 'jumlah', 'tunggu', 'dokter', 'jamkes', 'pasien'));
    }
}
