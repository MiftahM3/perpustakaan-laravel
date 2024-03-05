<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Penerbit extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'penerbit';
    protected $fillable = ['nama','slug'];

    public function buku()
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
