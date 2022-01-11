<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Gantt;
class GanttChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gantt::create(
            [
                'start_date'    =>      '10-01-2022 00:00', 
                'text'          =>      "GA drawing",
                'duration'      =>      "5",
                'progress'      =>      "0",
                'parent'        =>      "0",
                'status'        =>      "1",
                'created_by'    =>      "0",
                "open"          =>      "true"
            ]
        );
        Gantt::create(
            [
                'start_date'    =>      '13-01-2022 00:00', 
                'text'          =>      "Structural drawing",
                'duration'      =>      "5",
                'progress'      =>      "0",
                'parent'        =>      "0",
                'status'        =>      "1",
                'created_by'    =>      "0",
                "open"          =>      "true"
            ]
        );
        Gantt::create(
            [
                'start_date'    =>      '15-01-2022 00:00', 
                'text'          =>      "Connection details",
                'duration'      =>      "5",
                'progress'      =>      "0",
                'parent'        =>      "0",
                'status'        =>      "1",
                'created_by'    =>      "0",
                "open"          =>      "true"
            ]
        );
        Gantt::create(
            [
                'start_date'    =>      '16-01-2022 00:00', 
                'text'          =>      "IFC control model",
                'duration'      =>      "5",
                'progress'      =>      "0",
                'parent'        =>      "0",
                'status'        =>      "1",
                'created_by'    =>      "0",
                "open"          =>      "true"
            ]
        );
        Gantt::create(
            [
                'start_date'    =>      '17-01-2022 00:00', 
                'text'          =>      "Fabrication drawing",
                'duration'      =>      "5",
                'progress'      =>      "0",
                'parent'        =>      "0",
                'status'        =>      "1",
                'created_by'    =>      "0",
                "open"          =>      "true"
            ]
        );
        Gantt::create(
            [
                'start_date'    =>      '19-01-2022 00:00', 
                'text'          =>      "CNC data",
                'duration'      =>      "5",
                'progress'      =>      "0",
                'parent'        =>      "0",
                'status'        =>      "1",
                'created_by'    =>      "0",
                "open"          =>      "true"
            ]
        );
    }
}  