<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Rak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function ubahStatus(Request $request, $id)
    {
        // Confirm Buku 
        $data = Peminjaman::findOrfail($id);
        $data->update([
            'status' => 1,
        ]);

        // Mengurangi Stok Buku
        $data->buku->update([
            'stok' => $data->buku->stok - 1
        ]);

        return redirect('DataPeminjaman')->with('success', 'Berhasil Mengonfirmasi');
    }


// Kembali buku
public function ubahStatus1(Request $request, $id)
{
    // Mengembalikan Buku
    $data = Peminjaman::findOrfail($id);
    $data->update([
        'status' => 2,
        'tanggal_kembali' => now(),
    ]);

    // Menambah Stok dari buku kembali
    $data->buku->update([
        'stok' => $data->buku->stok + 1
    ]);

    return redirect('DataPengembalian')->with('success', 'Berhasil Mengembalikan');
}

public function dataPengembalian()
    {
            $data = Peminjaman::all();
            $kategori = Kategori::all();
            return view('petugas.datapengembalian', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'data' => $data,
            ]);
    
    }

    public function dataPeminjaman()
    {
        
            $data = Peminjaman::all();
            $kategori = Kategori::all();
            return view('petugas.datapeminjaman', [
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'data' => $data,
            ]);
    }
  
    public function deletePeminjaman(Request $request, $id)
    {
        $data = Peminjaman::findOrfail($id);

        $data->buku->update([
            'stok' => $data->buku->stok + 1
        ]);
        $data->delete($request->all());
        return redirect()->back()->with('success', 'Peminjaman Berhasil Dibatalkan ');
    }
   

    public function laporan()
    {

            $data = Peminjaman::latest()->paginate(10);
            $kategori = Kategori::all();
            return view('petugas.laporan', [

                'users' => User::all(),
                'buku' => Buku::all(),
                'kategori' => $kategori,
                'penerbit' => Penerbit::all(),
                'raks' => Rak::all(),
                'title' => 'Semua Buku',
                'data' => $data,
            ]);
        
    }

}
