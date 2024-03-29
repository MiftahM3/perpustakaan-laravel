<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = ['Tidak Berkategori','Novel', 'Sejarah', 'Religi'];

        foreach ($kategori as $value) {
            Kategori::create([
                    'nama'=> $value,
                    'slug'=> Str::slug($value)
            ]);
        }
       
    }
}
