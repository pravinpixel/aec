<?php

namespace Database\Seeders;

use App\Models\Layer;
use Illuminate\Database\Seeder;

class LayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layer::create(['layer_name' => 'Construction', 'is_active' => 1]);
        Layer::create(['layer_name' => 'External planking', 'is_active' => 1]);
        Layer::create(['layer_name' => 'External Cladding', 'is_active' => 1]);
        Layer::create(['layer_name' => 'External Insulation', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Internal planking', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Facade plaster', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Facade wood', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Insulation', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Dry lining', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Horizontal Nailers', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Planking', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Vapour Barrier', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Vertical Nailers', 'is_active' => 1]);
        Layer::create(['layer_name' => 'Wind Barrier', 'is_active' => 1]);
        
    }
}
