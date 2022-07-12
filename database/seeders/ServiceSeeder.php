<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create(['output_type_id' => 1,'service_name' => 'GA Drawing & Plan Drawing', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'IFC Control Model', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'Logistics Planning Drawing', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'Connection Details', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'CNC Data', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'Installation Sequence Drawing', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'Global Static Calculation (RIB)', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'Fabrication Drawing', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'Element Static Calculation', 'is_active' => 1]);
        Service::create(['output_type_id' => 1,'service_name' => 'Bill of Material', 'is_active' => 1]);
        Service::create(['output_type_id' => 2,'service_name' => 'Approval Drawings, Sections & Plans', 'is_active' => 1]);
        Service::create(['output_type_id' => 2,'service_name' => 'Bill of Materials', 'is_active' => 1]);
    }
}
