<?php

namespace Database\Seeders;

use App\Models\BuildingComponent;
use Illuminate\Database\Seeder;

class BuildingComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BuildingComponent::create(['building_component_name' => 'External Wall', 'order_id'=> 1,'is_active' => 1]);
        BuildingComponent::create(['building_component_name' => 'Internal Wall',  'order_id'=> 2,'is_active' => 1]);
        BuildingComponent::create(['building_component_name' => 'Partition Wall', 'order_id'=> 3, 'is_active' => 1]);
        BuildingComponent::create(['building_component_name' => 'Ceiling',  'order_id'=> 4,'is_active' => 1]);
        BuildingComponent::create(['building_component_name' => 'Roof',  'order_id'=> 5, 'is_active' => 1]);
    }
}
