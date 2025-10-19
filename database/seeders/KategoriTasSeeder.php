<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTasSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama' => 'Backpack'],
            ['nama' => 'Sling Bag'],
            ['nama' => 'Tote Bag'],
        ];
        
        DB::table('kategori_tas')->insert($kategori);
    }
}