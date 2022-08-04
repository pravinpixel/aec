<?php

if(! function_exists('Template')) {
    function Template($data) {
        switch ($data['template_name']) {
            case 'AssignForEstimation':
                return "
                    <div class='my-3'> 
                        <p class='lead mb-2'> <strong>Assign for Estimation</strong></p>
                        <div class='btn-group w-100'>
                            {$data['input']}
                            <button class='input-group-text btn btn-info'
                                ng-click='assignTechnicalEstimate(assign_to, 'verification)'> Assign </button>
                            <button class='input-group-text btn btn-danger' ng-click='removeUser()'> Remove </button>
                        </div> 
                    </div>
                ";
                break;
            
            default:
                return null;
                break;
        }
    }
}