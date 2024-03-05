<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Buku extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'buku';
    protected $fillable= [
        'judul',
        'slug',
        'sampul',
        'penulis',
        'penerbit_id',
        'kategori_id',
        'rak_id',
        'stok',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['judul']
            ]
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);

    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);

    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);

    }

    public function peminjaman(){

        return $this->hasMany(Peminjaman::class);
    }
    public function favorit(){
        return $this->hasMany(Favorit::class);
    }
    
}
