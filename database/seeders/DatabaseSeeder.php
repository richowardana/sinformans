<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bantuan;
use App\Models\DetailBantuan;
use App\Models\DetailKeluarga;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(10)->create();
        Penduduk::factory(40)->create();
        Keluarga::factory(10)->create();
        Bantuan::factory(5)->create();
        DetailBantuan::factory(10)->create();
        DetailKeluarga::factory(2)->create();
    }
}
