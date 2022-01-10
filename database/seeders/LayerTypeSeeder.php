<?php

namespace Database\Seeders;

use App\Models\LayerType;
use Illuminate\Database\Seeder;

class LayerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LayerType::create(['layer_type_name' => 'Construction', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'External Cladding', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'External Insulation', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Horizontal Nailers', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Internal Planking', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Insulation', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Planking', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Planking', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Vapour Barrier', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Vertical Nailers', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Wind Barrier', 'building_component_id' => 1, 'layer_id' => 1, 'is_active' => 1]);
    }
}
