<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Spesialis;
use Exception;
use Illuminate\Http\Request;
use File;
use Image;
use Illuminate\Support\Str;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::orderBy('created_at', 'DESC')->get();
        return view('dokter.index', compact('dokter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'address' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'spesialis' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        try {
            //default photo = null
            $photo = null;
            //jika terdapat file gambar yang dikirim 
            if ($request->hasFile('gambar')) {
                //maka menjalankan method save file
                $photo = $this->saveFile($request->name, $request->file('gambar'));
            }

            $dokter = Dokter::create([
                'name' => $request->name,
                'address' => $request->address,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'spesialis' => $request->spesialis,
                'gambar' => $photo
            ]);
            return redirect('dokter')->with(['success' => 'Dokter: <strong>' . $dokter->name . '</strong> Ditambahkan']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    private function saveFile($name, $photo)
    {
        //set nama file adalah gabungan antara nama dokter dan time(). Ekstensi gambar tetap dipertahankan
        $images = str::slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        //set path untuk menyimpan gambar
        $path = public_path('uploads/dokter');
        //cek jika uploads/post bukan direktori / folder
        if (!File::isDirectory($path)) {
            //maka folder tersebut dibuat
            File::makeDirectory($path, 0777, true, true);
        }
        //simpan gambar yang diuplaod ke folrder uploads/post
        Image::make($photo)->save($path . '/' . $images);
        //mengembalikan nama file yang ditampung divariable $images
        return $images;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);

        return view('dokter.show', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
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
            'name' => 'required|string',
            'address' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'spesialis' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:7000'
        ]);

        try {
            $dokter = Dokter::findOrFail($id);
            $photo = $dokter->gambar;

            //cek jika ada datd yang di kirim dari form
            if ($request->hasFile('gambar')) {
                //cek jika foto tidak kosong
                //maka foto yang lama akan terhapus
                !empty($photo) ? File::delete(public_path('uploads/dokter/' . $photo)) : null;
                //uploading file dengan menggunakan method saveFile() yg telah dibuat sebelumnya
                $photo = $this->saveFile($request->name, $request->file('gambar'));
            }

            $dokter->update([
                'name' => $request->name,
                'address' => $request->address,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'spesialis' => $request->spesialis,
                'gambar' => $photo
            ]);
            return redirect('dokter')->with(['success' => 'Dokter : <strong>' . $dokter->name . '</strong> Diupdate']);
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
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect('dokter')->with(['success' => 'Dokter : <strong> ' . $dokter->name . '</strong> Dihapus']);
    }
}
