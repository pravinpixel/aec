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
        LayerType::create(['layer_type_name' => 'Construction', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'External Cladding', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'External Insulation', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Horizontal Nailers', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Internal Planking', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Insulation', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Planking', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Planking', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Vapour Barrier', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Vertical Nailers', 'is_active' => 1]);
        LayerType::create(['layer_type_name' => 'Wind Barrier', 'is_active' => 1]);
    }
}
