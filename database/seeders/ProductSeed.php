<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('products')->insert([
            'product_name' => 'Produk A',
            'description' => 'ini deskripsi',
            'price' => 100,
            'quantity' => 50,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('products')->insert([
            'product_name' => 'Produk B',
            'description' => 'ini deskripsi',
            'price' => 200,
            'quantity' => 10,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
