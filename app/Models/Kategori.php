<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Kategori extends Model
{
    
    use HasFactory;
    use Sluggable;

    protected $table = 'kategori';
    protected $fillable = ['nama','slug'];

public function rak()
{
    return $this->hasMany(Rak::class);
}

public function bukus()
{
    return $this->hasMany(Buku::class);
}

public function favorit(){
    return $this->hasMany(Favorit::class);
}

    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => ['nama']
        ]
    ];
}

}
