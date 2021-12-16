<?php

namespace Database\Seeders;

use App\Models\BuildingType;
use Illuminate\Database\Seeder;

class BuildingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BuildingType::create(['building_type_name' => 'Apartment', 'is_active' => 1]);
        BuildingType::create(['building_type_name' => 'Cabin', 'is_active' => 1]);
        BuildingType::create(['building_type_name' => 'Commercial Building', 'is_active' => 1]);
        BuildingType::create(['building_type_name' => 'Living House', 'is_active' => 1]);
        BuildingType::create(['building_type_name' => 'others', 'is_active' => 1]);
        BuildingType::create(['building_type_name' => 'Public Building', 'is_active' => 1]);
    }
}
