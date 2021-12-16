<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectType::create(['project_type_name' => 'New Construction', 'is_active' => 1]);
        ProjectType::create(['project_type_name' => 'Renovation', 'is_active' => 1]);
        ProjectType::create(['project_type_name' => 'Others', 'is_active' => 1]);
    }
}
