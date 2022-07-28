<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create(
            ['enquiry_prefix' => 'EQ', 
            'enquiry_number' => '001',
            'enquiry_year' => '2022', 
            'customer_enquiry_year' => '2022', 
            'customer_prefix' => 'CENQ', 
            'customer_enquiry_number' => '001',
            'project_prefix' => 'PRO',
            'project_number' => '1',
            'employee_prefix' => 'EMP',
            'employee_number' => '1'
        ]);
    }
}
