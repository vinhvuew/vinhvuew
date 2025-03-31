<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'ten_danh_muc' => 'Điện thoại',
                'trang_thai' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_danh_muc' => 'Laptop',
                'trang_thai' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_danh_muc' => 'Phụ kiện',
                'trang_thai' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
