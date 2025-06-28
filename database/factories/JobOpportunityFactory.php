<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOpportunity>
 */
class JobOpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title' => $this->faker->word(),
            'job_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'freelance', 'internship']),
            'experience_level' => $this->faker->randomElement(['entry', 'junior', 'mid-level', 'senior', 'executive']),
            'salary' => $this->faker->randomFloat(2, 1000, 10000),
            'required_skills' => json_encode($this->faker->words(5)),
            'company' => $this->faker->company(),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
            'description' => $this->faker->words(100),
        ];
    }
}
