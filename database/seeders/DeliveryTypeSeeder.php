<?php

namespace Database\Seeders;

use App\Models\DeliveryType;
use Illuminate\Database\Seeder;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryType::create(['delivery_type_name' => 'Element Type', 'is_active' => 1]);
        DeliveryType::create(['delivery_type_name' => 'Precut Type', 'is_active' => 1]);
        DeliveryType::create(['delivery_type_name' => 'Module Type', 'is_active' => 1]);
        DeliveryType::create(['delivery_type_name' => 'Mix of All', 'is_active' => 1]);
        DeliveryType::create(['delivery_type_name' => 'Others', 'is_active' => 1]);
    }
}
