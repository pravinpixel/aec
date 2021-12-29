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
        // $this->call(RoleSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(BuildingComponentSeeder::class);
        $this->call(BuildingTypeSeeder::class);
        $this->call(DeliveryTypeSeeder::class);
        $this->call(ProjectTypeSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(LayerSeeder::class);
        $this->call(DocumentTypeSeeder::class);
    }
}
