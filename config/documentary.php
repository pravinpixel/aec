<?php

return [

    'enquiries' => [
        'Enquiry Date'          => "enquiry_date",
        'Enquiry Number'        => "enquiry_number",
        'Contact Person'        => "contact_person",
        'Project Name'          => "project_name",
        'Project Date'          => "project_date",
        'Site Address'          => "customer_address",
        'Country'               => "country",
        'Zipcode'               => "zipcode",
        'State'                 => "state",
        'No Of Building'        => "no_of_building",
        'Project Delivery Date' => "project_delivery_date",
    ],
    
    'customers' => [
        'Customer Enquiry Date' => "customer_enquiry_date",
        'Organization No'       => 'customer_organization_no',
        'Full Name'             => "customer_full_name",
        'First Name'            => "customer_first_name",
        'Last Name'             => "customer_last_name",
        'Email'                 => "email",
        'Mobile Number'         => "mobile_no",
        'Company Name'          => "company_name",
        'Contact Person'        => "contact_person",
        'City'                  => "customer_city",
        'State'                 => "customer_state",
        'Country'               => "customer_country",
    ],
    
    'userData'=>[
        'Logo'                     => "Logo",
        'Logo image with URL'      => "logo_image_with_url",
        'Dark logo image with URL' => "dark_logo_image_with_url",
        'CRM URL'                  => "crm_url",
        'Admin URL'                => "admin_url",
        'Main Domain'              => "main_domain",
        'Email Signature'          => "Email Signature",
        'Today Date'               => "today_date",
    ],
    'logo'=>[
        'key' => "data:image/png;base64,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",
    ],
    'merge_data' =>  [ 
        'Project Details' => [
            "Enquiry received date"  => "enquiry_date",
            "Project Name"           => "project_name",
            "Street Name"            => "street_name",
            "City"                   => "customer_city",
            "State"                  => "state",
            "Country"                => "country",
            "Zip Code"               => "zipcode",
            "No of Buildings"        => "no_of_building",
            "Project Start Date"     => "project_date",
            "Project Delivery Date"  => "project_delivery_date",
            "Project In-charge Name" => "project_in_charge_name",
            "Phone No"               => "mobile_no"
        ],
        'Customer Details' => [
            'Company Name'        => "company_name",
            'Organization No'     => 'customer_organization_no',
            "Street Name"         => "street_name",
            "City"                => "customer_city",
            "State"               => "state",
            "Country"             => "country",
            "Zip Code"            => "zipcode",
            'Contact Person Name' => "contact_person",
            'E-mail'              => "email",
            "Phone No"            => "mobile_no"
        ],
        'Admin Details' => [
            'Name'               => "admin_name",
            'Role No'            => 'admin_role',
            'E-mail'             => 'email',
            "Phone No"           => "mobile_no",
            "Comp Logo: (image)" => "logo_image_with_url",
            "Signature"          => "signature",
            "Comp Website"       => "company_website",
            "Today Date"         => "today_date",
        ],
        'Building Component and Price Details' => [
            "Calculated Total Price"         => "Calculated Total Price",
            "Building comp-1 Name "          => "Building comp-1 Name ",
            "Building comp-2 Name"           => "Building comp-2 Name",
            "Building comp-3 Name "          => "Building comp-3 Name ",
            "Building comp-4 Name"           => "Building comp-4 Name",
            "Building comp-1 Area: 00.00 m2" => "Building comp-1 Area: 00.00 m2",
            "Building comp-2 Area: 00.00 m2" => "Building comp-2 Area: 00.00 m2",
            "Building comp-3 Area: 00.00 m2" => "Building comp-3 Area: 00.00 m2",
            "Building comp-4 Area: 00.00 m2" => "Building comp-4 Area: 00.00 m2",
        ],
        'Offer doc Details' => [
            'Offer No' => 'offer_number',
            'Rev No'   => 'rev_number',
        ],
    ]
];