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
            [
                'CategoryName' => 'Reusable Items',
                'Slug' => 'reusable-items'
            ],
            [
                'CategoryName' => 'Home Goods',
                'Slug' => 'home-goods'
            ],
            [
                'CategoryName' => 'Personal Care',
                'Slug' => 'personal-care'
            ],
            [
                'CategoryName' => 'Fashion',
                'Slug' => 'fashion'
            ],
            [
                'CategoryName' => 'Energy Solutions',
                'Slug' => 'energy-solutions'
            ],
            [
                'CategoryName' => 'Up/Recycled Goods',
                'Slug' => 'up-recycled-goods'
            ],
            [
                'CategoryName' => 'Food',
                'Slug' => 'food'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'CategoryName' => $category['CategoryName'],
                'Slug' => $category['Slug']
            ]);
        }
    }
}
