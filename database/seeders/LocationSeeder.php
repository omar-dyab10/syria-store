<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            ['name_en' => 'Damascus', 'name_ar' => 'دمشق'],
            ['name_en' => 'Aleppo', 'name_ar' => 'حلب'],
            ['name_en' => 'Homs', 'name_ar' => 'حمص'],
            ['name_en' => 'Hama', 'name_ar' => 'حماة'],
            ['name_en' => 'Latakia', 'name_ar' => 'اللاذقية'],
            ['name_en' => 'Tartus', 'name_ar' => 'طرطوس'],
            ['name_en' => 'Idlib', 'name_ar' => 'إدلب'],
            ['name_en' => 'Daraa', 'name_ar' => 'درعا'],
            ['name_en' => 'As-Suwayda', 'name_ar' => 'السويداء'],
            ['name_en' => 'Quneitra', 'name_ar' => 'القنيطرة'],
            ['name_en' => 'Al-Hasakah', 'name_ar' => 'الحسكة'],
            ['name_en' => 'Deir ez-Zor', 'name_ar' => 'دير الزور'],
            ['name_en' => 'Raqqa', 'name_ar' => 'الرقة'],
            ['name_en' => 'Rif Dimashq', 'name_ar' => 'ريف دمشق'],
        ];

        foreach ($governorates as $gov) {
            Location::create([
                'parent_id' => null,
                'location_type' => 'governorate',
                'name_en' => $gov['name_en'],
                'name_ar' => $gov['name_ar'],
                'is_active' => 'active',
            ]);
        }
    }
}
