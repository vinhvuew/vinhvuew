<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            ['image' => 'banners/banner1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['image' => 'banners/banner2.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
