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
        // Car attributes
        // $carCategory = Category::where('name_en', 'Cars')->first();
        // if ($carCategory) {
        //     $carAttributes = [
        //         ['name_en' => 'Transmission', 'name_ar' => 'ناقل الحركة'],
        //         ['name_en' => 'Fuel Economy', 'name_ar' => 'اقتصاد الوقود'],
        //         ['name_en' => 'Sunroof', 'name_ar' => 'فتحة سقف'],
        //         ['name_en' => 'Leather Seats', 'name_ar' => 'مقاعد جلدية'],
        //         ['name_en' => 'Number of Doors', 'name_ar' => 'عدد الأبواب'],
        //         ['name_en' => 'Number of Seats', 'name_ar' => 'عدد المقاعد'],
        //     ];

        //     foreach ($carAttributes as $attribute) {
        //         DynamicAttribute::create([
        //             'category_id' => $carCategory->id,
        //             'name_en' => $attribute['name_en'],
        //             'name_ar' => $attribute['name_ar'],
        //         ]);
        //     }
        // }
        
        $apartmentCategories = Category::whereIn('name_en', [
            'apartment',
            'Studio Apartments',
            '1 Bedroom Apartments',
            '2 Bedroom Apartments',
            '3 Bedroom Apartments',
            '4+ Bedroom Apartments',
            'Penthouses',
            'Duplexes'
        ])->get();

        $apartmentAttributes = [
            ['name_en' => 'Number of Bedrooms', 'name_ar' => 'عدد غرف النوم'],
            ['name_en' => 'Number of Bathrooms', 'name_ar' => 'عدد الحمامات'],
            ['name_en' => 'Floor Number', 'name_ar' => 'رقم الطابق'],
            ['name_en' => 'Total Floors', 'name_ar' => 'إجمالي الطوابق'],
            ['name_en' => 'Area (m²)', 'name_ar' => 'المساحة (م²)'],
            ['name_en' => 'Furnished', 'name_ar' => 'مؤثثة'],
            ['name_en' => 'Balcony', 'name_ar' => 'شرفة'],
            ['name_en' => 'Parking', 'name_ar' => 'موقف سيارات'],
            ['name_en' => 'Elevator', 'name_ar' => 'مصعد'],
            ['name_en' => 'Air Conditioning', 'name_ar' => 'مكيف هواء'],
            ['name_en' => 'Heating', 'name_ar' => 'تدفئة'],
            ['name_en' => 'Kitchen Type', 'name_ar' => 'نوع المطبخ'],
        ];

        foreach ($apartmentCategories as $category) {
            foreach ($apartmentAttributes as $attribute) {
                DynamicAttribute::create([
                    'category_id' => $category->id,
                    'name_en' => $attribute['name_en'],
                    'name_ar' => $attribute['name_ar'],
                ]);
            }
        }
        $villaCategories = Category::where('name_en', 'villa')->get();

        $villaAttributes = [
            ['name_en' => 'Number of Bedrooms', 'name_ar' => 'عدد غرف النوم'],
            ['name_en' => 'Number of Bathrooms', 'name_ar' => 'عدد الحمامات'],
            ['name_en' => 'Number of Floors', 'name_ar' => 'عدد الطوابق'],
            ['name_en' => 'Garden Area', 'name_ar' => 'مساحة الحديقة'],
            ['name_en' => 'Swimming Pool', 'name_ar' => 'مسبح'],
            ['name_en' => 'Garage', 'name_ar' => 'كراج'],
            ['name_en' => 'Furnished', 'name_ar' => 'مؤثثة'],
            ['name_en' => 'Air Conditioning', 'name_ar' => 'مكيف هواء'],
            ['name_en' => 'Heating', 'name_ar' => 'تدفئة'],
            ['name_en' => 'Security System', 'name_ar' => 'نظام أمان'],
        ];
        foreach ($villaCategories as $category) {
            foreach ($villaAttributes as $attribute) {
                DynamicAttribute::create([
                    'category_id' => $category->id,
                    'name_en' => $attribute['name_en'],
                    'name_ar' => $attribute['name_ar'],
                ]);
            }
        }

        $landCategory = Category::where('name_en', 'land')->first(); // يعمل لأن الاسم متطابق
        if ($landCategory) {
            $landAttributes = [
                ['name_en' => 'Area (m²)', 'name_ar' => 'المساحة (م²)'],
                ['name_en' => 'Land Type', 'name_ar' => 'نوع الأرض'],
                ['name_en' => 'Zoning', 'name_ar' => 'التصنيف العمراني'],
                ['name_en' => 'Road Access', 'name_ar' => 'وصول الطريق'],
                ['name_en' => 'Water Access', 'name_ar' => 'وصول المياه'],
                ['name_en' => 'Electricity Access', 'name_ar' => 'وصول الكهرباء'],
            ];
            foreach ($landAttributes as $attribute) {
                DynamicAttribute::create([
                    'category_id' => $landCategory->id,
                    'name_en' => $attribute['name_en'],
                    'name_ar' => $attribute['name_ar'],
                ]);
            }
        }
    }
}
