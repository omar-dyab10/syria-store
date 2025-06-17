<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carBrands = [
            'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Land Cruiser'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot'],
            'BMW' => ['3 Series', '5 Series', 'X5', 'X7'],
            'Mercedes' => ['C-Class', 'E-Class', 'S-Class', 'GLC'],
            'Audi' => ['A4', 'A6', 'Q5', 'Q7']
        ];

        $colors = ['White', 'Black', 'Silver', 'Gray', 'Red', 'Blue'];
        $engineSizes = ['1.6', '2.0', '2.5', '3.0', '4.0'];
        $enginePowers = ['120', '150', '180', '200', '250', '300'];

        foreach ($carBrands as $brand => $models) {
            foreach ($models as $model) {
                Vehicle::create([
                    'vehicle_type' => 'car',
                    'brand' => $brand,
                    'model' => $model,
                    'series' => fake()->numberBetween(1000, 9999),
                    'version' => fake()->randomElement(['Standard', 'Premium', 'Sport', 'Luxury']),
                    'year' => (string) fake()->numberBetween(2018, 2024),
                    'mileage' => (string) fake()->numberBetween(0, 100000),
                    'engine_size' => fake()->randomElement($engineSizes),
                    'engine_power' => fake()->randomElement($enginePowers),
                    'color' => fake()->randomElement($colors),
                    'price' => (string) fake()->numberBetween(50000, 500000)
                ]);
            }
        }

        $this->command->info('Vehicles seeded successfully.');
    }
}
