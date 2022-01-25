<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // $this->call(AdminSeeder::class);
        
        $this->call(MasterCalculationSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(EstimationComponentSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(BuildingComponentSeeder::class);
        $this->call(BuildingTypeSeeder::class);
        $this->call(DeliveryTypeSeeder::class);
        $this->call(ProjectTypeSeeder::class);
        $this->call(OutputTypeSeeder::class);
        $this->call(ServiceSeeder::class);
        // $this->call(LayerSeeder::class);
        // $this->call(LayerTypeSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        // $this->call(GanttChartSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(LinksTableSeeder::class);
        $this->call(CostTasksTableSeeder::class);
        $this->call(CostLinksTableSeeder::class);
        
    }
}
