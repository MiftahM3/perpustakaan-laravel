<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::all();
        $bukus = Buku::paginate(10);
        $kategori = Kategori::all();
        $kategoris =   Kategori::where('id', '!=', 1)->get();
        $penerbit = Penerbit::all();
        $rak = Rak::all();
    
        return view('buku.index', compact('bukus', 'kategori', 'penerbit', 'rak' , 'kategoris'));
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


        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul')->store('sampul-buku');
        }

        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'sampul' => 'image|file|max:1024',
            'kategori_id' => 'required',
            'rak_id' => 'required',
            'penerbit_id' => 'required',
            'stok' => 'required|numeric|min:1',
        ]);

        if ($request->file('sampul')) {
            $validated['sampul'] = $request->file('sampul')->store('sampul-buku');
        }

        Buku::create($validated);

        return redirect('buku')->with('success', 'Berhasil Membuat Buku!');
        return view('buku.form', compact('bukus', 'kategoris'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bukus = Buku::find($id);
        $this->$bukus->judul;
        Kategori::where('id', '!=', 1)->get();
        Rak::all();
        Penerbit::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bukus = Buku::find($id);
        $bukus->judul = $request->judul;
        $bukus->penulis = $request->penulis;

        if ($request->hasFile('sampul')) {

            $destination = 'storage/' . $bukus->sampul;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('sampul');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('storage/', $filename);
            $bukus->sampul = $filename;
        }

        $bukus->kategori_id = $request->kategori_id;
        $bukus->rak_id = $request->rak_id;
        $bukus->penerbit_id = $request->penerbit_id;
        $bukus->update();
        return redirect()->back()->with('success', 'Berhasil update Buku!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bukus = Buku::find($id);
        $bukus->delete();

        return redirect('buku')->with('success', 'Data Berhasil Dihapus');
    }
}
