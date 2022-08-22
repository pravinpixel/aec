<?php

return [

    'models' => [

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Permission" model but you may use whatever you like.
         *
         * The model you want to use as a Permission model needs to implement the
         * `Spatie\Permission\Contracts\Permission` contract.
         */

        'permission' => Spatie\Permission\Models\Permission::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         *
         * The model you want to use as a Role model needs to implement the
         * `Spatie\Permission\Contracts\Role` contract.
         */

        'role' => Spatie\Permission\Models\Role::class,

    ],

    'table_names' => [

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'roles' => 'roles',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'permissions' => 'permissions',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_permissions' => 'model_has_permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_roles' => 'model_has_roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'role_has_permissions' => 'role_has_permissions',
    ],

    'column_names' => [
        /*
         * Change this if you want to name the related pivots other than defaults
         */
        'role_pivot_key' => null, //default 'role_id',
        'permission_pivot_key' => null, //default 'permission_id',

        /*
         * Change this if you want to name the related model primary key other than
         * `model_id`.
         *
         * For example, this would be nice if your primary keys are all UUIDs. In
         * that case, name this `model_uuid`.
         */

        'model_morph_key' => 'model_id',

        /*
         * Change this if you want to use the teams feature and your related model's
         * foreign key is other than `team_id`.
         */

        'team_foreign_key' => 'team_id',
    ],

    /*
     * When set to true, the method for checking permissions will be registered on the gate.
     * Set this to false, if you want to implement custom logic for checking permissions.
     */

    'register_permission_check_method' => true,

    /*
     * When set to true the package implements teams using the 'team_foreign_key'. If you want
     * the migrations to register the 'team_foreign_key', you must set this to true
     * before doing the migration. If you already did the migration then you must make a new
     * migration to also add 'team_foreign_key' to 'roles', 'model_has_roles', and
     * 'model_has_permissions'(view the latest version of package's migration file)
     */

    'teams' => false,

    /*
     * When set to true, the required permission names are added to the exception
     * message. This could be considered an information leak in some contexts, so
     * the default setting is false here for optimum safety.
     */

    'display_permission_in_exception' => false,

    /*
     * When set to true, the required role names are added to the exception
     * message. This could be considered an information leak in some contexts, so
     * the default setting is false here for optimum safety.
     */

    'display_role_in_exception' => false,

    /*
     * By default wildcard permission lookups are disabled.
     */

    'enable_wildcard_permission' => false,

    'cache' => [

        /*
         * By default all permissions are cached for 24 hours to speed up performance.
         * When permissions or roles are updated the cache is flushed automatically.
         */

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        /*
         * The cache key used to store all permissions.
         */

        'key' => 'spatie.permission.cache',

        /*
         * You may optionally indicate a specific cache driver to use for permission and
         * role caching using any of the `store` drivers listed in the cache.php config
         * file. Using 'default' here means to use the `default` set in cache.php.
         */

        'store' => 'default',
    ],
    
    'permissions' => [
        'dashboard' => [
            'dashboard' => '',
            'enquiry_dashboard' => [
                'enquiry_dashboard' => ''
            ],
            'project_dashboard' => [
                'project_dashboard' => ''
            ],
            'economy_dashboard' => [
                'economy_dashboard' => ''
            ],
            'employee_performance' => [
                'employee_performance' => ''
            ],
        ],
        'sale' => [
            'sale_index'  => '',
            'sale_add'    => '',
            'sale_edit'   => '',
            'sale_delete' => '',
            'enquiry'    => [
                'enquiry_index'      => '',
                'enquiry_add'        => '',
                'enquiry_edit'       => '',
                'enquiry_delete'     => '', 
                // 'technical_estimate' => [
                //     'technical_estimate_index'  => '',
                //     'technical_estimate_add'    => '',
                //     'technical_estimate_edit'   => '',
                //     'technical_estimate_delete' => '',
                // ],
                // 'cost_estimate' => [
                //     'cost_estimate_index'  => '',
                //     'cost_estimate_add'    => '',
                //     'cost_estimate_edit'   => '',
                //     'cost_estimate_delete' => '',
                // ],
                // 'proposal_sharing' => [
                //     'proposal_sharing_index'  => '',
                //     'proposal_sharing_add'    => '',
                //     'proposal_sharing_edit'   => '',
                //     'proposal_sharing_delete' => '',
                // ],
                // 'customer_response' => [
                //     'customer_response_index'  => '',
                //     'customer_response_add'    => '',
                //     'customer_response_edit'   => '',
                //     'customer_response_delete' => '',
                // ],
                'contract' => [
                    'contract_index'  => '',
                    'contract_add'    => '',
                    'contract_edit'   => '',
                    'contract_delete' => '',
                ]
            ]
        ],
        'project' => [
            'project_index'    => '',
            'project_add'      => '',
            'project_edit'     => '',
            'project_delete'   => '',
            'project_schedule' => [
                'project_schedule_index'  => '',
                'project_schedule_add'    => '',
                'project_schedule_edit'   => '',
                'project_schedule_delete' => '',
            ],
            'project_summary' => [
                'project_summary_index'  => '',
                'project_summary_add'    => '',
                'project_summary_edit'   => '',
                'project_summary_delete' => '',
            ]
        ],
       
        'issues' => [
            'task_index'  => '',
            'task_add'    => '',
            'task_edit'   => '',
            'task_delete' => '',
        ],

        'supplier_detail' => [
            'supplier_detail_index'  => '',
            'supplier_detail_add'    => '',
            'supplier_detail_edit'   => '',
            'supplier_detail_delete' => '',
        ],
        'customer_detail' => [
            'customer_detail_index'  => '',
            'customer_detail_add'    => '',
            'customer_detail_edit'   => '',
            'customer_detail_delete' => '',
        ],
        'administrator' => [
            'administrator_index' => '', 
            'cost_estimate_calculation' => [
                'cost_estimate_calculation_index' => ''
            ],
            'gantt_chart' => [
                'gantt_chart_index' => ''
            ],
            'employee' => [
                'employee_index'  => '',
                'employee_add'    => '',
                'employee_edit'   => '',
                'employee_delete' => '',
            ],
    
        ],
    ],
    'permission_styles' => [
        'dashboard'                 => 'px-0',
        'enquiry_dashboard'         => 'px-2',
        'project_dashboard'         => 'px-2',
        'economy_dashboard'         => 'px-2',
        'employee_performance'      => 'px-2',
        'sale'                      => 'px-0',
        'enquiry'                   => 'px-2',
        'technical_estimate'        => 'px-4',
        'cost_estimate'             => 'px-4',
        'proposal_sharing'          => 'px-4',
        'customer_response'         => 'px-4',
        'contract'                  => 'px-2',
        'project'                   => 'px-2',
        'task'                      => 'px-0',
        'project'                   => 'px-0',
        'task'                      => 'px-0',
        'issues'                    => 'px-0',
        'supplier_detail'           => 'px-0',
        'customer_detail'           => 'px-0',
        'project_schedule'          => 'px-4',
        'project_summary'           => 'px-4',
        'cost_estimate_calculation' => 'px-2',
        'gantt_chart'               => 'px-2',
        'employee'                  => 'px-2',
        'administrator'             => 'px-0',
    ]
];
