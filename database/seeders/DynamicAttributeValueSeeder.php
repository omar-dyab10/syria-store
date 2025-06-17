<?php

namespace Database\Seeders;

use App\Models\DynamicAttribute;
use App\Models\DynamicAttributeValue;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DynamicAttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get car attributes
        $carAttributes = DynamicAttribute::whereHas('category', function ($query) {
            $query->where('name_en', 'Cars');
        })->get();

        if ($carAttributes->isEmpty()) {
            $this->command->info('Car attributes not found. Please run DynamicAttributeSeeder first.');
            return;
        }

        // Get vehicles
        $vehicles = Vehicle::all();

        if ($vehicles->isEmpty()) {
            $this->command->info('No vehicles found. Please run VehicleSeeder first.');
            return;
        }

        foreach ($vehicles as $vehicle) {
            foreach ($carAttributes as $attribute) {
                $value = '';

                switch ($attribute->name_en) {
                    case 'Transmission':
                        $value = rand(0, 1) ? 'Automatic' : 'Manual';
                        break;
                    case 'Fuel Economy':
                        $value = rand(15, 40) . ' mpg';
                        break;
                    case 'Sunroof':
                    case 'Leather Seats':
                        $value = rand(0, 1) ? 'Yes' : 'No';
                        break;
                    case 'Number of Doors':
                        $value = (string) rand(2, 5);
                        break;
                    case 'Number of Seats':
                        $value = (string) rand(2, 8);
                        break;
                    default:
                        $value = 'Value for ' . $attribute->name_en;
                }

                DynamicAttributeValue::create([
                    'dynamic_attribute_id' => $attribute->id,
                    'entity_id' => $vehicle->id,
                    'entity_type' => 'App\\Models\\Vehicle',
                    'value_en' => $value,
                    'value_ar' => $this->getArabicValue($attribute->name_en, $value),
                ]);
            }
        }

        $this->command->info('Vehicle attribute values seeded successfully.');
    }

    /**
     * Get Arabic value for the given attribute and English value
     */
    private function getArabicValue(string $attributeName, string $englishValue): string
    {
        if ($englishValue === 'Yes') return 'نعم';
        if ($englishValue === 'No') return 'لا';
        if ($englishValue === 'Automatic') return 'أوتوماتيك';
        if ($englishValue === 'Manual') return 'يدوي';

        // For numeric values, just return the number
        if (is_numeric($englishValue)) {
            return $englishValue;
        }

        // For values with units (like mpg)
        if (strpos($englishValue, 'mpg') !== false) {
            $number = (int) $englishValue;
            return $number . ' ميل لكل جالون';
        }

        // Default case
        return 'قيمة لـ ' . $attributeName;
    }
}
