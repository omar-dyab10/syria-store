<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainCategories = [
            'Vehicles' => 'المركبات',
            'Real Estate' => 'العقارات',
            'Rental' => 'الإيجارات',
            'Jobs' => 'الوظائف',
            'Products' => 'المنتجات',
        ];
        $mainCategoryIds = [];
        foreach ($mainCategories as $name_en => $name_ar) {
            $category = Category::create([
                'parent_id' => null,
                'name_en' => $name_en,
                'name_ar' => $name_ar,
                'slug' => fake()->slug(),
            ]);
            $mainCategoryIds[$name_en] = $category->id;
        }

        $subCategories = [
            'Vehicles' => [
                'Cars' => 'سيارات',
                'Motorcycles' => 'دراجات نارية',
                'Trucks' => 'شاحنات',
            ],
            'Real Estate' => [
                'apartment' => 'شقة',
                'villa' => 'فيلا',
                'land' => 'أرض',
                'Workplace' => 'مكان العمل',
                'Building' => 'مبنى',
                'Tourist Facility' => 'مرفق سياحي',
            ],
            'Rental' => [],
            'Jobs' => [
                'Home Services' => 'خدمات منزلية',
                'Professional Services' => 'خدمات مهنية',
                'Health & Beauty' => 'الصحة والجمال',
                'Education & Training' => 'التعليم والتدريب',
                'Transportation' => 'النقل',
            ],
            'Products' => [],
        ];

        $subCategoryIds = [];
        foreach ($subCategories as $mainCategory => $subs) {
            foreach ($subs as $name_en => $name_ar) {
                $category = Category::create([
                    'parent_id' => $mainCategoryIds[$mainCategory],
                    'name_en' => $name_en,
                    'name_ar' => $name_ar,
                    'slug' => fake()->slug(),
                ]);
                $subCategoryIds[$name_en] = $category->id;
            }
        }

        $thirdLevelCategories = [
            'Cars' => [
                'BMW' => 'بي إم دبليو',
                'Mercedes' => 'مرسيدس',
                'Toyota' => 'تويوتا',
                'Honda' => 'هوندا',
                'Ford' => 'فورد',
                'Chevrolet' => 'شيفروليه',
                'Audi' => 'أودي',
                'Volkswagen' => 'فولكس فاجن',
                'Nissan' => 'نيسان',
                'Hyundai' => 'هيونداي',
            ],
            'Mobile Phones' => [
                'Apple' => 'أبل',
                'Samsung' => 'سامسونج',
                'Xiaomi' => 'شاومي',
                'Huawei' => 'هواوي',
                'Google' => 'جوجل',
                'OnePlus' => 'ون بلس',
                'Oppo' => 'أوبو',
                'Vivo' => 'فيفو',
            ],
            'Apartments for Sale' => [
                'Studio Apartments' => 'استوديوهات',
                '1 Bedroom Apartments' => 'شقق بغرفة نوم واحدة',
                '2 Bedroom Apartments' => 'شقق بغرفتي نوم',
                '3 Bedroom Apartments' => 'شقق بثلاث غرف نوم',
                '4+ Bedroom Apartments' => 'شقق بأربع غرف نوم أو أكثر',
                'Penthouses' => 'بنتهاوس',
                'Duplexes' => 'دوبلكس',
            ],
        ];

        foreach ($thirdLevelCategories as $subCategory => $thirds) {
            if (isset($subCategoryIds[$subCategory])) {
                foreach ($thirds as $name_en => $name_ar) {
                    Category::create([
                        'parent_id' => $subCategoryIds[$subCategory],
                        'name_en' => $name_en,
                        'name_ar' => $name_ar,
                        'slug' => fake()->slug(),
                    ]);
                }
            }
        }
    }
}
