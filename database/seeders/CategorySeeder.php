<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Reusable Items',
            'Home Goods',
            'Personal Care',
            'Fashion',
            'Energy Solutions',
            'Up/Recycled Goods',
            'Food',
        ];

        foreach ($categories as $categoryName) {
            Category::create([
                'CategoryName' => $categoryName,
            ]);
        }
    }
}
