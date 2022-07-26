<?php

namespace Database\Seeders;

use App\Models\WoodEstimation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gantt_tasks')->insert([
            
            [
                'start_date'    =>      '2022-01-12 00:00:00', 
                'text'          =>      "GA drawing",
                'duration'      =>      5,
                'progress'      =>      0,
                'parent'        =>      0,
                'type'          =>      "project"
            ],
            [
                'start_date'    =>      '2022-01-13 00:00:00', 
                'text'          =>      "Structural drawing",
                'duration'      =>      5,
                'progress'      =>      0,
                'parent'        =>      0,
                'type'          =>      "project"
            ],
            [
                'start_date'    =>      '2022-01-15 00:00:00', 
                'text'          =>      "Connection details",
                'duration'      =>      5,
                'progress'      =>      0,
                'parent'        =>      0,
                'type'          =>      "project"
            ],
            [
                'start_date'    =>      '2022-01-16 00:00:00', 
                'text'          =>      "IFC control model",
                'duration'      =>      5,
                'progress'      =>      0,
                'parent'        =>      0,
                'type'          =>      "project"
            ],
            [
                'start_date'    =>      '2022-01-17 00:00:00', 
                'text'          =>      "Fabrication drawing",
                'duration'      =>      5,
                'progress'      =>      0,
                'parent'        =>      0,
                'type'          =>      "project"
            ],
            [
                'start_date'    =>      '2022-01-19 00:00:00', 
                'text'          =>      "CNC data",
                'duration'      =>      5,
                'progress'      =>      0,
                'parent'        =>      0,
                'type'          =>      "project"
            ]
        ]);
    }
}


