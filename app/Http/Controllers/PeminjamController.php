<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Favorit;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Rak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        $data = Buku::paginate(8);
        $kategori = Kategori::where('id', '!=',1)->get();
        $penerbit = Penerbit::all();
        $rak = Rak::all();
        $title = 'Semua Buku';

        return view('peminjam.buku.index', compact('buku', 'kategori', 'penerbit', 'rak','title','data'));
    }

    public function detailPinjam()
    {
        $user = auth()->id();
        $data = Peminjaman::where('users_id', $user)->get();
        return view('peminjam.buku.detailpinjam',  [

            'buku' => Buku::all(),
            'user' => User::all(),
            'kategori' => Kategori::where('id', '!=',1)->get(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Semua Kategori',
            'data' => $data,
        ]);
    }

    public function pinjamBuku(Request $request, $id)
    {

        if (auth()->user()) {

         
            $pinjamlama = DB::table('peminjaman')
                ->where('users_id', auth()->user()->id)
                ->where('buku_id', $id)
                ->where('status', [0, 1])
                ->get();

        
            $buku = Buku::find($id);

            if ($pinjamlama->count() > 0) {
                return redirect()->back()->with('error', 'Anda sudah meminjam buku ini sebelumnya');

            } elseif ($pinjamlama->count() == 11) {
                return redirect()->back()->with('error', 'Buku yang dipinjam maksimal 10');
            } else {
                if (!$buku || $buku->stok == 0) {
                    return redirect()->back()->with('error', 'Buku tidak tersedia atau stok habis');
                } else {
                    Peminjaman::create([
                        'kode_pinjam' => random_int(10000000, 999999999),
                        'users_id' => auth()->user()->id,
                        'buku_id' => $id,
                        'tanggal_pinjam' => now(),
                        'batas_pinjam' => now()->addDays(29),
                        'status' => 0,
                    ]);
        
                    return redirect()->back()->with('success', 'Berhasil Mengajukan Meminjam');
                }
            }
        } else {
            Alert::error('Error', 'Anda belum Login');
        }
    
    }


    public function tampilDepan()
    {
        $buku = Buku::all();
        $data = Buku::paginate(8);
        $kategori = Kategori::where('id', '!=',1)->get();
        $penerbit = Penerbit::all();
        $rak = Rak::all();
        $title = 'Semua Buku';
    
        return view('peminjam.buku.index', compact('buku', 'kategori', 'penerbit', 'rak','title','data'));
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

        return view('peminjam.buku.index', [
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

        return view('peminjam.buku.index', [
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'kategori' => Kategori::where('id', '!=',1)->get(),
            'title' => $title,
            'data' => $data,
        ]);
    }

    public function favorit(Request $request, $id)
    {

            $favlama = DB::table('favorit')
                ->where('users_id', auth()->user()->id)
                ->where('buku_id', $id)
                ->get();

            if ($favlama->count() == 11) {
                return redirect()->back()->with('error', 'Buku yang difavorit maksimal 2');
            } else {

                if (isset($favlama[0])) {
                    if ($favlama[0]->buku_id == $id) {
                        return redirect()->back()->with('error', 'Buku yang difavorit tidak boleh sama');
                    }
                } else {
                    Favorit::create([

                        'users_id' => auth()->user()->id,
                        'buku_id' => $id,

                    ]);
                    return redirect()->back()->with('success', 'Berhasil Menambahkan Ke Favorit');
                }
            }
    }

    public function favorits()
    {
        $user = auth()->id();
        $datapinjam = Peminjaman::where('users_id', $user)->get();
        $data = Favorit::where('users_id', $user)->get();

        return view('peminjam.buku.favorit', [

            'buku' => Buku::all(),
            'user' => User::all(),
            'kategori' => Kategori::all(),
            'penerbit' => Penerbit::all(),
            'raks' => Rak::all(),
            'title' => 'Favorit',
            'data' => $data,
            'datapinjam' => $datapinjam,
        ]);
    }

    public function deleteFavorit(Request $request, $id)
    {
        $data = Favorit::findOrfail($id);
        $data->delete($request->all());
        return redirect()->back()->with('success', 'Berhasil Menghapus dari Favorit');
    }

}
