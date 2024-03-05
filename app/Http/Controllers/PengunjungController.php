<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Rak;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function tampil()
    {
        $buku = Buku::all();
        $buku = Buku::paginate(5);
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $rak = Rak::all();
    
        return view('depan.buku', compact('buku', 'kategori', 'penerbit', 'rak'));
    }

    public function tampilDepan()
    {
        $buku = Buku::all();
        $data = Buku::paginate(8);
        $kategori = Kategori::where('id', '!=',1)->get();
        $penerbit = Penerbit::all();
        $rak = Rak::all();
        $title = 'Semua Buku';
    
        return view('depan.buku', compact('buku', 'kategori', 'penerbit', 'rak','title','data'));
    }

    public function pilihBuku(Request $request, $id)
    {
        if ($request) {
            $data = Buku::latest()->where('kategori_id', $id)->paginate(12);
            $title = Kategori::find($id)->nama;
        }elseif ($request) {
             $data = Buku::find($id) ;
        }
        else {
            $data = Buku::latest()->paginate(12);
            $title = 'Semua Buku';
        }

        return view('depan.buku', [
            'kategori' => Kategori::where('id', '!=',1)->get(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => $title,
            'data' => $data,
        ]);
    }

    public function pilihPenerbit(Request $request, $id)
    {
        if ($request) {
            $data = Buku::latest()->where('penerbit_id', $id)->paginate(12);
            $title = Penerbit::find($id)->nama;
        } else {
            $data = Buku::latest()->paginate(12);
            $title = 'Semua Buku';
        }

        return view('depan.buku', [
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'kategori' => Kategori::where('id', '!=',1)->get(),
            'title' => $title,
            'data' => $data,
        ]);
    }
}
