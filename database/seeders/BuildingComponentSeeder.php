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
        $externalWall = BuildingComponent::create(['building_component_name' => 'External Wall','building_component_icon' => 'dripicons-store', 'top_position'=> 'Exterior',  'bottom_position'=> 'Interior',  'order_id'=> 1,'is_active' => 1]);
        $internalWall = BuildingComponent::create(['building_component_name' => 'Internal Wall', 'building_component_icon' =>'uil uil-store-alt', 'top_position'=> '',  'bottom_position'=> '', 'order_id'=> 2,'is_active' => 1]);
        $partitionWall = BuildingComponent::create(['building_component_name' => 'Partition Wall', 'building_component_icon' =>'uil uil-wall', 'top_position'=> '',  'bottom_position'=> '', 'order_id'=> 3, 'is_active' => 1]);
        $ceiling = BuildingComponent::create(['building_component_name' => 'Ceiling', 'building_component_icon' =>'uil uil-layers', 'top_position'=> '',  'bottom_position'=> '', 'order_id'=> 4,'is_active' => 1]);
        $roof = BuildingComponent::create(['building_component_name' => 'Roof',  'building_component_icon' =>'uil uil-mountains-sun', 'top_position'=> 'Exterior',  'bottom_position'=> 'Bottom', 'order_id'=> 5, 'is_active' => 1]);

        $externalWall->layers()->createMany([
            ['layer_name' => 'Construction','user_type' => 'admin'],
            ['layer_name' => 'External planking','user_type' => 'admin'],
            ['layer_name' => 'External Cladding','user_type' => 'admin']
        ]);

        $internalWall->layers()->createMany([
            ['layer_name' => 'Internal planking','user_type' => 'admin'],
            ['layer_name' => 'Facade plaster','user_type' => 'admin'],
            ['layer_name' => 'Facade wood','user_type' => 'admin']
        ]);
        
        $partitionWall->layers()->createMany([
            ['layer_name' => 'Insulation','user_type' => 'admin'],
            ['layer_name' => 'Dry lining','user_type' => 'admin'],
            ['layer_name' => 'Horizontal Nailers','user_type' => 'admin']
        ]);

        $ceiling->layers()->createMany([
            ['layer_name' => 'Planking','user_type' => 'admin'],
            ['layer_name' => 'Vapour Barrier','user_type' => 'admin'],
            ['layer_name' => 'Vertical Nailers','user_type' => 'admin']
        ]);

        $roof->layers()->createMany([
            ['layer_name' => 'Planking','user_type' => 'admin'],
            ['layer_name' => 'Vapour Barrier','user_type' => 'admin'],
            ['layer_name' => 'Vertical Nailers','user_type' => 'admin']
        ]);
    }
}
