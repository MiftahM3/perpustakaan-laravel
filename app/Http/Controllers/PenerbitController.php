<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use App\Models\Buku;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerbit = Penerbit::all();
        $penerbit = Penerbit::paginate(5);
        return view('penerbit.index', compact('penerbit'));
       
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
            'nama' => 'required|unique:penerbit|max:255',
          ]);

          Penerbit::create($request->all());

        return redirect('penerbit')->with('status','Data Berhasil Tersimpan');

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
        $penerbit= Penerbit::find($id);
        $this->$penerbit->nama; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->nama = $request->nama;
        $penerbit->slug = $request->nama;
        $penerbit->update();

        return redirect('penerbit')->with('status','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penerbit = Penerbit::find($id);
        $penerbit->delete();
        $buku = Buku::where('penerbit_id', $penerbit->id)->get();
        foreach ($buku as $key => $value) {
            $value->update([
                'penerbit_id'=>2
            ]);
        }

        return redirect('penerbit')->with('success','Data Berhasil Dihapus');
    }
}
