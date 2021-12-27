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
        Config::create(['enquiry_prefix' => 'ENQ', 'enquiry_number' => '001','customer_prefix' => 'CENQ', 'customer_enquiry_number' => '001']);
    }
}
