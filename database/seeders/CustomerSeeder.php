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
        'first_name' => 'aec',
        'last_name' => 'customer',
        'full_name' => 'aecprefab customer',
        'email' => 'customer@aecprefab.net',
        'password' => Hash::make('customer@123'),
        'mobile_no' => '12345678',
        'company_name' => 'aecprefab',
        'contact_person' => 'alan',
        'remarks' => 'ok',
        'is_active' => 1,
        'created_by' => 1,
        'updated_by' => 1,
        ]);
        $latest_enquiry_number = GlobalService::enquiryNumber();
        $customer->enquiry()->create(['enquiry_number' => $latest_enquiry_number, 'enquiry_date' => now()]);
        GlobalService::updateConfig('ENQ');
    }
}
