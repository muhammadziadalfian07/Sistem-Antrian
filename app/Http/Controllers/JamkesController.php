<?php

namespace App\Http\Controllers;

use App\Jamkes;
use Exception;
use Illuminate\Http\Request;

class JamkesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jamkes = Jamkes::orderBy('created_at', 'DESC')->get();
        return view('jamkes.index', compact('jamkes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jamkes.create');
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
            'abbreviation' => 'required'
        ]);

        try {
            $jamkes = Jamkes::create([
                'name' => $request->name,
                'abbreviation' => $request->abbreviation
            ]);
            return redirect('jamkes')->with(['success' => 'Jamkesmas : <strong>' . $jamkes->name . '</strong> Ditambahkan']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
        $jamkes = Jamkes::findOrFail($id);
        return view('jamkes.edit', compact('jamkes'));
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
            'abbreviation' => 'required|string'
        ]);
        try {
            $jamkes = Jamkes::findOrFail($id);
            $jamkes->update([
                'name' => $request->name,
                'abbreviation' => $request->abbreviation
            ]);
            return redirect('jamkes')->with(['success' => 'Jamkesmas : <strong>' . $jamkes->name . '</strong> Diupdate']);
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
        $jamkes = Jamkes::findOrFail($id);
        $jamkes->delete();
        return redirect('jamkes')->with(['success' => 'Jamkesmas : <strong>' . $jamkes->name . '</strong> Dihapus']);
    }
}
