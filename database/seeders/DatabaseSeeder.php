<?php

namespace Database\Seeders;

use App\Models\DynamicAttribute;
use App\Models\RealEstate;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LocationSeeder::class,
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            VehicleSeeder::class,
            RentalSeeder::class,
            RealEstateSeeder::class,
            JobOpportunitySeeder::class,
            ProductSeeder::class,
            DynamicAttributeSeeder::class,
            DynamicAttributeValueSeeder::class,
        ]);
    }
}
