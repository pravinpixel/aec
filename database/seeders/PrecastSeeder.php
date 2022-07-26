<?php

namespace Database\Seeders;

use App\Models\PrecastEstimation;
use Illuminate\Database\Seeder;

class PrecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrecastEstimation::create(['name'=> 'Staircase', 'hours'=> 32, 'is_active'=> 1]);
        PrecastEstimation::create(['name'=> 'Staircase House Wall', 'hours'=> 32, 'is_active'=> 1]);
        PrecastEstimation::create(['name'=> 'Balcony', 'hours'=> 8, 'is_active'=> 1]);
        PrecastEstimation::create(['name'=> 'Beams & Columns', 'hours'=> 8, 'is_active'=> 1]);
    }
}
