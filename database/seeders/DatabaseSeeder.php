<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            KategoriTasSeeder::class,
        ]);

        User::create([
            'name' => 'Tas',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}