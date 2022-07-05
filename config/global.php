<?php

return [
    'mail_from_address' => 'john_ps@aecprefab.net',
    'model_date_format' => 'd-m-Y',
    'db_date_format'    => 'Y-m-d',
    'db_date_format_with_time' => 'Y-m-d H:i:s',
    'mobile_no_pattern' => '^\d{8}$|^\d{12}$',
    'email' => '^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$',
    'mobile_no_length' => '12',
    'date_period' => 30,

    'file_path' => [
        'building_component_uploads' => 'building_component_uploads',
        'ifc_model_uploads' => 'ifc_model_uploads',
    ],
    'autodesk_upload_file_type' => [
        'nwd', 
        'nwf', 
        'nwc',
        'fbx',
        'dwg', 
        'dxf',
        'sat',
        'stp', 
        'step',
        'dwf',
        'ifc',
        'igs', 
        'iges',
        'ipt', 
        'iam',
        'ipj',
        'jt',  
        'dgn', 
        'prp', 
        'prw',
        'x_b',
        'dri',
        'rvm',
        'skp',
        'stp', 
        'step',
        'stl',
        'wrl', 
        'wrz',
        '3ds', 
        'prjv'
    ],

    'cost_estimater' => 'cost_estimate',

    'technical_estimater' => 'technical_estimate',

    'project_manager' => 'project_manager',

    'job_delay' => 60,

    'cost_estimate_types' => [
        '1' => 'Building Type 1',
        '2' => 'Building Type 2',
        '3' => 'Building Type 3',
        '4' => 'Building Type 4',
        '5' => 'Building Type 5',
        '6' => 'Building Type 6',
        '7' => 'Building Type 7',
        '8' => 'Building Type 8',
        '9' => 'Building Type 9',
        '10' => 'Building Type 10'
    ],

];