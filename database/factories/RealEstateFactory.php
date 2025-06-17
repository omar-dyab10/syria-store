<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstate>
 */
class RealEstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'realEstate_type' => $this->faker->randomElement(['apartment', 'villa', 'land', 'Workplace', 'Building', 'Tourist Facility']),
            'area' => $this->faker->numberBetween(15, 100000),
            'number' => $this->faker->numberBetween(1, 10000),
            'status' => $this->faker->randomElement(['available','reserved','sold']),
            'price' => $this->faker->numberBetween(50, 10000),
        ];
    }
}
