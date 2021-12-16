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
        Service::create(['service_name' => 'Approval Drawings, Sections & Plans', 'is_active' => 1]);
        Service::create(['service_name' => 'Bill of Materials', 'is_active' => 1]);
        Service::create(['service_name' => 'Building Information Model', 'is_active' => 1]);
        Service::create(['service_name' => 'CAD/CAM Modeling', 'is_active' => 1]);
        Service::create(['service_name' => 'CNS Machine Data for Pre-cut', 'is_active' => 1]);
        Service::create(['service_name' => 'Construction Logistics', 'is_active' => 1]);
        Service::create(['service_name' => 'Construction Procedure', 'is_active' => 1]);
        Service::create(['service_name' => 'Details of Connections', 'is_active' => 1]);
        Service::create(['service_name' => 'Element Installation Drawings', 'is_active' => 1]);
        Service::create(['service_name' => 'Element Production Drawings', 'is_active' => 1]);
        Service::create(['service_name' => 'Pre-cut Assembly Drawings', 'is_active' => 1]);
        Service::create(['service_name' => 'Structural Engineering', 'is_active' => 1]);
        Service::create(['service_name' => 'Others', 'is_active' => 1]);
       
    }
}
