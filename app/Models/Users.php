<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
    ];

    public function role(){

        return $this->belongsTo(Roles::class);

    }
    public function peminjaman(){

        return $this->hasMany(Peminjaman::class);

    }

    public function favorit(){
        return $this->hasMany(Favorit::class);
    }
    
}
