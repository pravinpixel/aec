<?php

namespace Database\Seeders;

use App\Models\ActivityList;
use Illuminate\Database\Seeder;

class ActivityListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityList::create(['name' => 'GA Drawing', 'is_active' => 1]);
        ActivityList::create(['name' => '2D Connection Detail Drawing', 'is_active' => 1]);
        ActivityList::create(['name' => 'Structural Element Drawing', 'is_active' => 1]);
        ActivityList::create(['name' => 'Foundation Concrete Drawing(optional)', 'is_active' => 1]);
        ActivityList::create(['name' => 'Window and door legend drawings', 'is_active' => 1]);

        ActivityList::create(['name' => 'External and Internal wall Fabrication drawings', 'is_active' => 1]);
        ActivityList::create(['name' => 'Floor Fabrication drawings', 'is_active' => 1]);
        ActivityList::create(['name' => 'Roof Fabrication drawings', 'is_active' => 1]);
        ActivityList::create(['name' => 'Beam and column manufacturing drawings', 'is_active' => 1]);

        ActivityList::create(['name' => 'External and Internal wall Fabrication drawings', 'is_active' => 1]);
        ActivityList::create(['name' => 'Floor Fabrication drawings', 'is_active' => 1]);
        ActivityList::create(['name' => 'Roof Fabrication drawings', 'is_active' => 1]);
        ActivityList::create(['name' => '3D Installation drawings ( optional)', 'is_active' => 1]);
        ActivityList::create(['name' => 'Total Material List(Timber and steel components)', 'is_active' => 1]);
        ActivityList::create(['name' => 'Foundation sill Drawings)', 'is_active' => 1]);
        ActivityList::create(['name' => 'Transport Packaging Drawing(client Optional)', 'is_active' => 1]);
        ActivityList::create(['name' => 'CNC DATA (client Optional)', 'is_active' => 1]);
        ActivityList::create(['name' => 'Find set of drawings uploaded in BIM 360', 'is_active' => 1]);
    }
}
