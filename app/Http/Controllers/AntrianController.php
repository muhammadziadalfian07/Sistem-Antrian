<?php

namespace App\Http\Controllers;

use App\Antrian;
use App\Pasien;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pasien = Pasien::orderBy('created_at', 'DESC')->get();
        $antrian = Antrian::where('status', 0)->orderBy('created_at', 'ASC')->first();

        return view('antrian.index', compact('antrian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $antrian = Antrian::findOrFail($id);
        $pasien = Pasien::findOrFail($id);

        $pasien->update([
            'antrian_id' => 0
        ]);

        $antrian->delete();

        return redirect()->back()->with(['success' => 'Nomor Antrian : <strong>' . $antrian->no_antrian . '</strong> Dihapus']);
    }

    public function panggil($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->update(['status' => 1]);

        return redirect()->back()->with(['success' => 'Nomor Antrian : <strong>' . $antrian->no_antrian . '</strong> Dipanggil']);
    }

    public function cancel($id)
    {
        $antrian = Antrian::findOrFail($id);
        $antrian->update(['status' => 2]);

        return redirect()->back()->with(['success' => 'Nomor Antrian : <strong>' . $antrian->no_antrian . '</strong> Dicancel']);
    }


    public function tampil()
    {
        $antrian = Antrian::where('status', 1)->orderBy('created_at', 'desc')->get();
        $skip = Antrian::where('status', 2)->orderBy('created_at', 'desc')->get();
        return view('antrian.view', compact('antrian', 'skip'));
    }

    public function truncate(Request $request){

      
        Antrian::truncate();
        
        Alert::success('Nomor Antrian Berhasil Direstart!');
        return redirect()->back();
    }
}
