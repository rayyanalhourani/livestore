<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "product_id"=>Product::inRandomOrder()->first()->id,
            "user_id"=>User::inRandomOrder()->first()->id,
            "rating"=> $this->faker->numberBetween(1,5),
            "comment"=> $this->faker->paragraph()
        ];
    }
}
