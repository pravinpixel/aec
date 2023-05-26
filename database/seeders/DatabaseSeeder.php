<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            MasterCalculationSeeder::class,
            EstimationComponentSeeder::class,
            ConfigSeeder::class,
            CustomerSeeder::class,
            BuildingComponentSeeder::class,
            BuildingTypeSeeder::class,
            DeliveryTypeSeeder::class,
            ProjectTypeSeeder::class,
            OutputTypeSeeder::class,
            ServiceSeeder::class,
            DocumentTypeSeeder::class,
            DocumentarySeeder::class,
            SharePointAccessSeeder::class,
            PermissionSeeder::class,
            TaskListSeeder::class,
            CheckListSeeder::class,
            WoodMasterSeeder::class,
            PrecastSeeder::class,
            ActivityListSeeder::class,
            CheckSheetSeeder::class,
            IfcFilesIconsSeeder::class,
            SharePointMasterFolderSeeder::class,
            calendarSeeder::class
        ]);
    }
}
