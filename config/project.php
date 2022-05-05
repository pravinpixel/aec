<?php
return [
    'time_zones' => [
        'norway'     => 'Norway (GMT+1)',
        'washington' => 'Washington, DC, USA (GMT-4)',
        'india'      => 'India (GMT+5:30)'
    ],
    
    'languages' => [
       'en'  => 'English',
       'no' => 'Norwegian' 
    ],

    'project_types' => [
        "Commercial",
        "Convention Center",
        "Data Center",
        "Hotel / Motel",
        "Office",
        "Parking Structure / Garage",
        "Performing Arts",
        "Retail",
        "Stadium/Arena",
        "Theme Park",
        "Warehouse (non-manufacturing)",
        "Healthcare",
        "Assisted Living / Nursing Home",
        "Hospital",
        "Medical Laboratory",
        "Medical Office",
        "OutPatient Surgery Center",
        "Institutional",
        "Court House",
        "Dormitory",
        "Education Facility",
        "Government Building",
        "Library",
        "Military Facility",
        "Museum",
        "Prison / Correctional Facility",
        "Recreation Building",
        "Religious Building",
        "Research Facility / Laboratory",
        "Residential",
        "Multi-Family Housing",
        "Single-Family Housing",
        "Infrastructure",
        "Airport",
        "Bridge",
        "Canal / Waterway",
        "Dams / Flood Control / Reservoirs",
        "Harbor / River Development",
        "Rail",
        "Seaport",
        "Streets / Roads / Highways",
        "Transportation Building",
        "Tunnel",
        "Waste Water / Sewers",
        "Water Supply",
        "Industrial & Energy",
        "Manufacturing / Factory",
        "Oil & Gas",
        "Plant",
        "Power Plant",
        "Solar Far",
        "Utilities",
        "Wind Farm",
        "Sample Projects",
        "Demonstration Project",
        "Template Project",
        "Training Project"
    ],

    'default_folder' => [
        [
            "isDirectory"=> true,
            "name"=> "Project Management"
        ],
        [
            "isDirectory"=> true,
            "name"=> "Engineering"
        ],
        [
            "isDirectory"=> true,
            "name"=> "Custom Input"
        ],
        [
            "isDirectory"=> true,
            "name"=> "AGA CAD Settings"
        ],
        [
            "isDirectory"=> true,
            "name"=> "Procurement"
        ],
        [
            "isDirectory"=> true,
            "name"=> "Pictures"
        ],
        [
            "isDirectory"=> true,
            "name"=> "Checklist"
        ]
    ],

    'bim' => [
        'default_company' => env('BIMDEFAULTCOMPANY'),
    ]
    
];