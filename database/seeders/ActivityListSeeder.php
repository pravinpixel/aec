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
    }
}
