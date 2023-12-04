<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'CategoryName' => 'Reusable Items'
        ]);

        DB::table('categories')->insert([
            'CategoryName' => 'Home Goods'
        ]);

        DB::table('categories')->insert([
            'CategoryName' => 'Personal Care'
        ]);

        DB::table('categories')->insert([
            'CategoryName' => 'Fashion'
        ]);

        DB::table('categories')->insert([
            'CategoryName' => 'Energy Solutions'
        ]);

        DB::table('categories')->insert([
            'CategoryName' => 'Up/Recycled Goods'
        ]);

        DB::table('categories')->insert([
            'CategoryName' => 'Food'
        ]);
    }
}
