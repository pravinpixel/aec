<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Services\GlobalService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::create([
            'customer_enquiry_date' => now(),
            'first_name'            => 'aec',
            'last_name'             => 'customer',
            'full_name'             => 'aecprefab customer',
            'email'                 => 'customer@aecprefab.net',
            'password'              => 12345678,
            'mobile_no'             => '87456123',
            'company_name'          => 'AEC PREFAB AS',
            'contact_person'        => 'alan walker',
            'remarks'               => 'ok',
            'is_active'             => 1,
            'created_by'            => 1,
            'updated_by'            => 1,
        ]);
        $latest_enquiry_number = GlobalService::customerEnquiryNumber();
        $enquiry_number = GlobalService::enquiryNumber();
        $customer->enquiry()->create(['created_by' =>1, 'contact_person' => 'alan walker',  'mobile_no' => '87456123', 'customer_enquiry_number' => $latest_enquiry_number, 'enquiry_number' => $enquiry_number, 'enquiry_date' => now()]);
        GlobalService::updateConfig('CENQ');
        GlobalService::updateConfig('ENQ');
    }
}