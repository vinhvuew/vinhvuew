<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder

{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'ma_san_pham' => 'SP001',
                'ten_san_pham' => 'Sản phẩm A',
                'gia' => 100000,
                'gia_khuyen_mai' => 90000,
                'so_luong' => 50,
                'ngay_nhap' => now(),
                'mo_ta' => 'Mô tả sản phẩm A',
                'trang_thai' => true,
                'category_id' => 1,
                'anh_san_pham' => 'images/sp001.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_san_pham' => 'SP002',
                'ten_san_pham' => 'Sản phẩm B',
                'gia' => 200000,
                'gia_khuyen_mai' => 180000,
                'so_luong' => 30,
                'ngay_nhap' => now(),
                'mo_ta' => 'Mô tả sản phẩm B',
                'trang_thai' => true,
                'category_id' => 2,
                'anh_san_pham' => 'images/sp002.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
