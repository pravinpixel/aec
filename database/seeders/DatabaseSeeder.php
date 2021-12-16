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
        $this->call(ConfigSeeder::class);
        $this->call(ProjectTypeSeeder::class);
        $this->call(BuildingTypeSeeder::class);
        $this->call(DeliveryTypeSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
