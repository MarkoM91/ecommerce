<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 300),  // Random price between 10 and 300
            'brand' => $this->faker->company(),  // Random brand name
            'size' => $this->faker->numberBetween(6, 12),  // Random shoe size between 6 and 12
            'color' => $this->faker->colorName(),
            'image' => $this->faker->imageUrl(640, 480, 'shoes', true),  // Random shoe image
            'stock' => $this->faker->numberBetween(0, 100),  // Random stock between 0 and 100
        ];
    }
}
