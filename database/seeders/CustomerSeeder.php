<?php

namespace Database\Seeders;

use App\Models\AecUsers;
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
        $aec_user = AecUsers::create([
            'first_name'            => 'aec',
            'job_role' => 6,
            'last_name'             => 'customer',
            'full_name'             => 'aecprefab customer',
            'email'                 => 'customer@aecprefab.net',
            'password'              => Hash::make(12345678),
            'image'                 => "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
        ]);
        $customer = Customer::create([
            'customer_enquiry_date' => now(),
            'first_name'            => 'aec',
            'last_name'             => 'customer',
            'full_name'             => 'aecprefab customer',
            'email'                 => 'customer@aecprefab.net',
            'password'              => 12345678,
            'mobile_no'             => '87456123',
            'company_name'          => 'AEC PREFAB AS',
            'contact_person'        => 'aec customer',
            'remarks'               => 'ok',
            'is_active'             => 1,
            'created_by'            => 1,
            'updated_by'            => 1,
            'aec_user_id'           => $aec_user->id,
            'image'                 => "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png"
        ]);
        $latest_enquiry_number = GlobalService::customerEnquiryNumber();
        $enquiry_number = GlobalService::enquiryNumber();
        $customer->enquiry()->create(['created_by' => 1, 'contact_person' => 'aec customer',  'mobile_no' => '87456123', 'customer_enquiry_number' => $latest_enquiry_number, 'enquiry_number' => $enquiry_number, 'enquiry_date' => now()]);
        GlobalService::updateConfig('CENQ');
        GlobalService::updateConfig('ENQ');
    }
}
