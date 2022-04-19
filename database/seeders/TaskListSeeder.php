<?php

namespace Database\Seeders;

use App\Models\TaskList;
use Illuminate\Database\Seeder;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        TaskList::insert([
            ['task_list_name' => "1st set of delivery - Approval drawings", 'is_active'=>  1],
            ['task_list_name' => "2nd set of delivery - Fabrication drawings", 'is_active'=>  1],
            ['task_list_name' => "3rd set of delivery - Installation drawings", 'is_active'=>  1],
            ['task_list_name' => "2nd set of delivery - Structural Report", 'is_active'=>  1],
            ['task_list_name' => "3rd set of delivery - Data for client Review", 'is_active'=>  1],
            ['task_list_name' => "4th set of delivery - Data for client Review", 'is_active'=>  1],
            ['task_list_name' => "Final Delivery", 'is_active'=>  1],
            ['task_list_name' => "others", 'is_active'=>  1]
        ]);
    }
}
