<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $mainImage = $this->faker->image('public\image\products', 640, 480, false);
        $mainImageName = pathinfo($mainImage, PATHINFO_BASENAME);
        return [
            'ProductName' => $this->faker->word,
            'Slug' => $this->faker->slug,
            'Description' => $this->faker->paragraph,
            'ITE' => $this->faker->paragraph,
            'Price' => $this->faker->randomNumber(5),
            'StockQuantity' => $this->faker->randomNumber(3),
            'ProductImage' => $mainImageName,
            'GalleryImages' => json_encode([
                $mainImageName,
                $mainImageName,
                $mainImageName,
                $mainImageName
            ]),
            'CategoryID' => $this->faker->numberBetween(1, 7),
        ];
    }
}
