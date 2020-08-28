<?php

namespace App\Http\Controllers;

use App\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //jumlah antrian
        $jumlah = Antrian::where('status', 0)->orderBy('created_at', 'DESC')->get();

        //menunggu
        $tunggu = Antrian::where('status', 0)->orderBy('created_at', 'ASC')->first();

        // antrian 
        $antrian = Antrian::where('status', 1)->orderBy('updated_at', 'DESC')->first();

        // antrian 
        $terpanggil = Antrian::where('status', 1)->get();

        // antrian 
        $tercancel = Antrian::where('status', 2)->get();


        return view('home', compact('antrian', 'jumlah', 'tunggu', 'terpanggil', 'tercancel'));
    }
}
