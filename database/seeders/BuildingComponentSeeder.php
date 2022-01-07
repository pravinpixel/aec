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
        BuildingComponent::create(['building_component_name' => 'External Wall','building_component_icon' => 'dripicons-store', 'order_id'=> 1,'is_active' => 1]);
        BuildingComponent::create(['building_component_name' => 'Internal Wall', 'building_component_icon' =>'uil uil-store-alt', 'order_id'=> 2,'is_active' => 1]);
        BuildingComponent::create(['building_component_name' => 'Partition Wall', 'building_component_icon' =>'uil uil-wall', 'order_id'=> 3, 'is_active' => 1]);
        BuildingComponent::create(['building_component_name' => 'Ceiling', 'building_component_icon' =>'uil uil-layers', 'order_id'=> 4,'is_active' => 1]);
        BuildingComponent::create(['building_component_name' => 'Roof',  'building_component_icon' =>'uil uil-mountains-sun', 'order_id'=> 5, 'is_active' => 1]);
    }
}
