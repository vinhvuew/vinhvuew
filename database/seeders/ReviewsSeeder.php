<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'customer_id' => 1,
                'product_id' => 1,
                'rating' => 5,
                'review' => 'Sản phẩm rất tốt!',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 2,
                'product_id' => 2, 
                'rating' => 4,
                'review' => 'Sản phẩm dùng ổn, sẽ mua lại.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
