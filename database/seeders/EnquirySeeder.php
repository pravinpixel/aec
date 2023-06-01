<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EnquirySeeder extends Seeder
{
    public function run()
    {
        function generateEnquiry($i)
        {
            Enquiry::create([
                "enquiry_date"                    => Carbon::now()->addDay($i),
                "created_at"                      => Carbon::now()->addDay($i),
                "enquiry_number"                  => "EQ/2023/" . $i,
                "customer_enquiry_number"         => "CUEN/2023/" . $i,
                "company_name"                    => "AEC PREFAB AS",
                "contact_person"                  => "Mr. surya",
                "mobile_no"                       => "85214700",
                "secondary_mobile_no"             => "95214700",
                "customer_id"                     => 1,
                "building_type_id"                => 2,
                "delivery_type_id"                => 2,
                "project_type_id"                 => 2,
                "project_name"                    => "New project | Building",
                "project_date"                    => Carbon::now()->addDay($i + 10),
                "place"                           => "xyz place",
                "site_address"                    => "lorem iposium oio",
                "country"                         => "india",
                "zipcode"                         => "600096",
                "city"                            => "Chennai",
                "state"                           => "Tamilnadu",
                "no_of_building"                  => 2,
                "project_delivery_date"           => Carbon::now()->addDay($i + 50),
                "building_component_process_type" => 1,
                "project_info"                    => 1,
                "service"                         => 1,
                "ifc_model_upload"                => 1,
                "building_component"              => 1,
                "additional_info"                 => 1,
                "initiate_from"                   => "customer",
                "is_active"                       => 0,
                "status"                          => "Submitted",
                "project_status"                  => "Unattended"
            ]);
        }
        for ($i = 2; $i < 50; $i++) {
            generateEnquiry($i);
            generateEnquiry($i);
            if(strlen($i == 2)) {
                generateEnquiry($i + 2);
                generateEnquiry($i + 3);
                generateEnquiry($i + 4);
                generateEnquiry($i + 5);
            }
        }
    }
}
