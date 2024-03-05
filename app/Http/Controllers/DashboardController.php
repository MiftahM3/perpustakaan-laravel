<?php

namespace App\Http\Controllers;

use App\Charts\PeminjamanChart;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(PeminjamanChart $peminjamanChart){

        $chart = $peminjamanChart->build();
        $bukuCount = Buku::count();
        $kategoriCount = Kategori::count();
        $userCount = User::count();
        $penerbitCount = Penerbit::count();
        $peminjamanct = Peminjaman::count();

        return view ('petugas.dashboard' , compact('bukuCount','kategoriCount','userCount','penerbitCount','peminjamanct','chart'));
    }

    public function kategoriChart(){

        $data = Peminjaman::selectRaw('kategori.nama AS nama_kategori, COUNT(*) AS jumlah_peminjaman')
        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
        ->join('kategori', 'buku.kategori_id', '=', 'kategori.id')
        ->groupBy('kategori.nama')
        ->get();

       return $data;
       
    }

}
