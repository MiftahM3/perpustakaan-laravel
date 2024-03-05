<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Rak extends Model
{
    use HasFactory;


    protected $table = 'rak';
    protected $fillable = ['rak','baris','slug','kategori_id',];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);

    }

    public function buku()
{
    return $this->hasMany(Buku::class);
}

public function favorit(){
    return $this->hasMany(Favorit::class);
}
}
