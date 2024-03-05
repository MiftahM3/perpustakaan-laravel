<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = ['kode_pinjam','users_id','buku_id','status','tanggal_pinjam','tanggal_kembali'];

   

    public function buku()
    {
        return $this->belongsTo(Buku::class);

    }
    public function users(){

        return $this->belongsTo(Users::class);
    }

}
