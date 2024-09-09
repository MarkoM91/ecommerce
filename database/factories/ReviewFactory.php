<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),  // Create a new user
            'product_id' => Product::factory(),  // Create a new product
            'rating' => $this->faker->numberBetween(1, 5),  // Random rating between 1 and 5
            'comment' => $this->faker->sentence(),
        ];
    }
}
