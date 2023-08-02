<?php
return [
    "wizard_menus" => [
        "ADMIN" => [
            [
                "name" => "Overview",
                "slug" => "overview",
                "icon" => '<i class="bi bi-clipboard-data"></i>',
                "view" => "overview"
            ],
            [
                "name" => "Milestone",
                "slug" => "milestone",
                "icon" => '<i class="bi bi-signpost"></i>',
                "view" => "milestone"
            ],
            [
                "name" => "Task List",
                "slug" => "task-list",
                "icon" => '<i class="bi bi-list-check"></i>',
                "view" => "task-list"
            ],
            // [
            //     "name" => "BIM 360",
            //     "slug" => "bim-360",
            //     "icon" => '<i class="bi bi-binoculars"></i>',
            //     "view" => "bim-360"
            // ],
            [
                "name" => "Issues",
                "slug" => "issues",
                "icon" => '<i class="bi bi-exclamation-circle"></i>',
                "view" => "issues"
            ],
            [
                "name" => "Variation Orders",
                "slug" => "variation-orders",
                "icon" => '<i class="bi bi-file-text"></i>',
                "view" => "variation-orders"
            ],
            [
                "name" => "Invoice Status",
                "slug" => "invoice-status",
                "icon" => '<i class="bi bi-receipt"></i>',
                "view" => "invoice-status"
            ],
            [
                "name" => "All Documents",
                "slug" => "documents",
                "icon" => '<i class="bi bi-file-pdf-fill"></i>',
                "view" => "documents"
            ],
            // [
            //     "name" => "Comments",
            //     "slug" => "project-comments",
            //     "icon" => '<i class="bi bi-pencil-square"></i>',
            //     "view" => "project-comments"
            // ],
            [
                "name" => "Project Closure",
                "slug" => "project-closure",
                "icon" => '<i class="bi bi-question-circle"></i>',
                "view" => "project-closure"
            ],
        ],
        "CUSTOMER" => [
            [
                "name" => "Overview",
                "slug" => "overview",
                "icon" => '<i class="bi bi-clipboard-data"></i>',
                "view" => "overview"
            ],
            [
                "name" => "Milestone",
                "slug" => "milestone",
                "icon" => '<i class="bi bi-signpost"></i>',
                "view" => "task-list"
            ],
            // [
            //     "name" => "BIM 360",
            //     "slug" => "bim-360",
            //     "icon" => '<i class="bi bi-binoculars"></i>',
            //     "view" => "bim-360"
            // ],
            [
                "name" => "Issues",
                "slug" => "issues",
                "icon" => '<i class="bi bi-exclamation-circle"></i>',
                "view" => "issues"
            ],
            [
                "name" => "Variation Orders",
                "slug" => "variation-orders",
                "icon" => '<i class="bi bi-file-text"></i>',
                "view" => "variation-orders"
            ],
            [
                "name" => "Invoice Status",
                "slug" => "invoice-status",
                "icon" => '<i class="bi bi-receipt"></i>',
                "view" => "invoice-status"
            ],
            [
                "name" => "All Documents",
                "slug" => "documents",
                "icon" => '<i class="bi bi-file-pdf-fill"></i>',
                "view" => "documents"
            ],
            [
                "name" => "Comments",
                "slug" => "project-comments",
                "icon" => '<i class="bi bi-pencil-square"></i>',
                "view" => "project-comments"
            ],
        ]
    ],
    "project_closure" => [
        "Is all the tasks are completed ?",
        "Is all the issues are close and resolved ?",
        "Is the all the payment milestones are cleared & Paid ?",
        "Is all the variation requests are completed ?"
    ]
];
