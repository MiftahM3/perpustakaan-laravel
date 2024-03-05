<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'judul'=> ' One Piece',
            'slug'=> Str::slug('One Piece'),
            'sampul' => 'sampul_onepiece.jpg',
            'penulis'=>'Eiichiro Oda',
            'penerbit_id'=> 1,
            'kategori_id'=> 2,
            'rak_id'=> 1,
            'stok'=>10
        ]);

        Buku::create([
            'judul'=> '172 Days',
            'slug'=> Str::slug('172 Days'),
            'sampul' => 'sampul_172days.jpg',
            'penulis'=>'Nadzira Shafa',
            'penerbit_id'=> 2,
            'kategori_id'=> 2,
            'rak_id'=> 2,
            'stok'=>10
        ]);

    }
}
