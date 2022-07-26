<?php

namespace Database\Seeders;

use App\Models\WoodEstimation;
use Illuminate\Database\Seeder;

class WoodMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WoodEstimation::create(['name'=> 'Details']);
        WoodEstimation::create(['name'=> 'Statics']);
        WoodEstimation::create(['name'=> 'CAD/CAM']);
        WoodEstimation::create(['name'=> 'Logistics']);
    }
}
