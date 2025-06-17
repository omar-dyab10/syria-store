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
        return [
            'product_type' => $this->faker->word(),
            'name_en' => $this->faker->words(3, true),
            'name_ar' => $this->faker->words(3, true),
            'brand' => $this->faker->company(),
            'year' => $this->faker->year(),
            'status' => $this->faker->randomElement(['available', 'reserved', 'sold']),
            'warranty' => $this->faker->randomElement(['yes', 'no']),
            'warranty_duration' => $this->faker->numberBetween(0, 36), // Random months between 0-36
            'price' => $this->faker->numberBetween(100, 10000),
            'description' => $this->faker->text(190) // Limiting text to avoid database column overflow
        ];
    }
}
