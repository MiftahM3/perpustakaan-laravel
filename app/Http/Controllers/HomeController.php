<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Rak;
use Illuminate\Http\Request;

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
    public function tampil()
    {
        $buku = Buku::all();
        $bukus = Buku::simplePaginate(5);
        $kategori = Kategori::where('id', '!=', 1)->get();
        $penerbit = Penerbit::all();
        $rak = Rak::all();
    
        return view('depan.buku', compact('buku', 'kategori', 'penerbit', 'rak'));
    }
}
