<?php

namespace Database\Seeders;

use App\Models\DynamicAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DynamicAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carCategory = Category::where('name_en', 'Cars')->first();

        if (!$carCategory) {
            $this->command->info('Required categories not found. Please run CategorySeeder first.');
            return;
        }

        $carAttributes = [
            ['name_en' => 'Transmission', 'name_ar' => 'ناقل الحركة'],
            ['name_en' => 'Fuel Economy', 'name_ar' => 'اقتصاد الوقود'],
            ['name_en' => 'Sunroof', 'name_ar' => 'فتحة سقف'],
            ['name_en' => 'Leather Seats', 'name_ar' => 'مقاعد جلدية'],
            ['name_en' => 'Number of Doors', 'name_ar' => 'عدد الأبواب'],
            ['name_en' => 'Number of Seats', 'name_ar' => 'عدد المقاعد'],
        ];

        foreach ($carAttributes as $attribute) {
            DynamicAttribute::create([
                'category_id' => $carCategory->id,
                'name_en' => $attribute['name_en'],
                'name_ar' => $attribute['name_ar'],
            ]);
        }

        // Create attributes for other categories
        // $otherCategories = Category::whereNotIn('id', $carCategory->id)
        //     ->where('parent_id', '!=', null)
        //     ->get();

        // foreach ($otherCategories as $category) {
        //     DynamicAttribute::factory()->count(3)->create([
        //         'category_id' => $category->id,
        //     ]);
        // }
    }
}
