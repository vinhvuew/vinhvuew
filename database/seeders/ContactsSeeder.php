<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'name' => 'Lê Văn C',
                'email' => 'levanc@example.com',
                'phone' => '0965432109',
                'message' => 'Tôi cần tư vấn sản phẩm.',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hoàng Thị D',
                'email' => 'hoangthid@example.com',
                'phone' => '0954321098',
                'message' => 'Cần hỗ trợ về đơn hàng.',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
