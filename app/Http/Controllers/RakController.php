<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raks = Rak::all();
        $raks = Rak::paginate(5);
        $kategori = Kategori::where('id', '!=', 1)->get();

        return view('rak.index', compact('raks','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ 
            'rak' => 'required|numeric|min:1',
            'baris'=> 'required|numeric|min:1|not_in:0',
            'kategori_id'=> 'required|numeric|min:1',

        ]);

        Rak::create([
            'rak'=> $request->rak,
            'baris'=> $request->baris,
            'slug'=> $request->rak .'-'. $request->baris,
            'kategori_id'=> $request->kategori_id,
        ]);

        return redirect('rak')->with('success','Data Berhasil Tersimpan');
        return view('rak.form', compact('raks','kategori'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $raks= Rak::find($id);
        $this->$raks->rak; 
        $kategori = Kategori::where('id', '!=', 1)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $raks = Rak::find($id);
        $raks->rak = $request->rak;
        $raks->baris = $request->baris;
        $raks->slug = $request->rak.'-'.$request->baris;
        $raks->kategori_id = $request->kategori_id;
        $raks->update();
        return redirect('rak')->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $raks = Rak::findOrfail($id);
        $raks->delete($request->all());

        return redirect('rak')->with('success','Data Berhasil Dihapus');
    }
}
