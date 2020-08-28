<?php

namespace App\Http\Controllers;

use App\Antrian;
use App\Dokter;
use App\Jamkes;
use App\Pasien;
use App\Poli;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::orderBy('created_at', 'ASC')->get();

        return view('pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokter = Dokter::all();
        $jamkes = Jamkes::orderBy('created_at', 'DESC')->get();
        return view('pasien.create', compact('jamkes', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $antrian = $this->getAntrian();
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'keluhan' => 'required',
            'jamkes_id' => 'required',
            'dokter_id' => 'required'
        ]);

        try {
            $pasien = Pasien::create([
                'name' => $request->name,
                'address' => $request->address,
                'keluhan' => $request->keluhan,
                'antrian_id' => $antrian,
                'jamkes_id' => $request->jamkes_id,
                'dokter_id' => $request->dokter_id,
            ]);
            return redirect('pasien')->with(['success' => 'Pasien : <strong>' . $pasien->name . '</strong> Ditambahkan']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function getAntrian()
    {
        $antrian = '';

        $data = DB::table('antrians')->count();

        if (strlen($data) == 1) {
            $antrian = "R00" . ((int) $data + 1);
        } else if (strlen($data) == 2) {
            $antrian = "R0" . ((int) $data + 1);
        } else {
            $antrian = "R" . ((int) $data + 1);
        }
        $tanggal = date('Y-m-d');
        $data = DB::table('antrians')->insert([
            'no_antrian' => $antrian,
            'created_at' => $tanggal
        ]);
       
        return $data;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antrian = Antrian::findOrFail($id);
        $pasien = Pasien::findOrFail($id);
        return view('pasien.show', compact('pasien', 'antrian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pasien = Pasien::findOrFail($id);
        $dokter = Dokter::orderBy('created_at', 'DESC')->get();
        $jamkes = Jamkes::orderBy('created_at', 'DESC')->get();
        return view('pasien.edit', compact('pasien', 'dokter', 'jamkes'));
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

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'keluhan' => 'required',
            'jamkes_id' => 'required',
            'dokter_id' => 'required'
        ]);

        try {

            $pasien = Pasien::findOrFail($id);
            $pasien->update([
                'name' => $request->name,
                'address' => $request->address,
                'keluhan' => $request->keluhan,
                'jamkes_id' => $request->jamkes_id,
                'dokter_id' => $request->dokter_id
            ]);
            return redirect('pasien')->with(['success' => 'Pasien : <strong>' . $pasien->name . '</strong> Diupdate']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->back()->with(['success' => 'Pasien : <strong>' . $pasien->name . '</strong> Dihapus']);
    }

    public function cetak_pdf()
    {
        $pasien = Pasien::all();

        $pdf = PDF::loadview('pasien.pasien_pdf', ['pasien' => $pasien]);
        return $pdf->download('laporan-pasien-pdf');
    }

    public function cetakAntrian($id)
    {
        $antrian = Antrian::findOrFail($id);
        $pasien = Pasien::findOrFail($id);
        return view('pasien.cetak', compact('pasien', 'antrian'));
    }

    public function daftar(Request $request)
    {
        $antrian = $this->getAntrian();
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'keluhan' => 'required',
            'jamkes_id' => 'required',
            'dokter_id' => 'required'
        ]);

        try {
            $pasien = Pasien::create([
                'name' => $request->name,
                'address' => $request->address,
                'keluhan' => $request->keluhan,
                'antrian_id' => $antrian,
                'jamkes_id' => $request->jamkes_id,
                'dokter_id' => $request->dokter_id,
            ]);
            Alert::success('Anda Telah Terdaftar', 'Silahkan Cetak Nomor Antria Anda!');
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function truncate(Request $request){
        Pasien::truncate();
        Alert::success('Daftar Pasien Berhasil Dihapus!');
        return redirect()->back();
    }
}
