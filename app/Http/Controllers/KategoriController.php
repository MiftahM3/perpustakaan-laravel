<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $kategori = Kategori::where('id', '!=', 1)->paginate(6);
     
        return view('kategori.index', compact('kategori'));

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
            'nama' => 'required|unique:kategori|max:255',
        ]);

        Kategori::create($request->all());

        return redirect('kategori')->with('sukses','Data Berhasil Tersimpan');
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
        $kategoris= Kategori::find($id);
        $this->$kategoris->nama; 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->slug = $request->nama;
        $kategori->update();

     
        return redirect('kategori')->with('sukses','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();
        $rak = Rak::where('kategori_id', $kategori->id)->get();
        foreach ($rak as $key => $value) {
            $value->update([
                'kategori_id'=>1
            ]);
        }
            $buku = Buku::where('kategori_id', $kategori->id)->get();
            foreach ($buku as $key => $value) {
            $value->update([
                'kategori_id'=>1
            ]);
        }

        return redirect('kategori')->with('success','Data Berhasil Dihapus');
    }
}

