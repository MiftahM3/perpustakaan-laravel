<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Schema::disableForeignKeyConstraints();
     Role::truncate();
     Schema::enableForeignKeyConstraints();

     $data = [
        'admin','petugas','pengguna'
     ];

     foreach ($data as $key => $value) {
        Role::insert(['name'=> $value]);
     }
    }
}
