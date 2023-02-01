
<?php

use App\Models\Admin\Employees;
use App\Models\ProjectTeamSetup;
use Haruncpi\LaravelIdGenerator\IdGenerator;


if(!function_exists('getTeamByProjectId')) {
    function getTeamByProjectId($id) {
        $teamSetup = ProjectTeamSetup::where('project_id',$id)->pluck('team');
        $employees = [];
        foreach ($teamSetup as $key => $users) {
            foreach ($users as $key => $user_id) {
                $employees[] = Employees::whereId($user_id)->select('image','id','display_name','reference_number')->get()->first()->toArray();
            }

        }
        return $employees;
    }
}
if(!function_exists('getAllAdmin')) {
    function getAllAdmin()    {
       return Employees::where('job_role',1)->select('image','id','display_name','reference_number')->get()->toArray();
    }
}

if(!function_exists('issue_id')) {
    function issue_id()    {
        $number = IdGenerator::generate([
            'table'  => 'aec_issues',
            'length' => 5,
            'prefix' => "0"
        ]); 
        return 'TIK/'.date('Y').'/'.$number;
    }
} 

if(!function_exists('Priorities')) {
    function Priorities()    {
        return [
            [ "type" => "CRITICAL", "text" => __('project.CRITICAL'), ],
            [ "type" => "HIGH", "text" => __('project.HIGH'), ],
            [ "type" => "MEDIUM", "text" => __('project.MEDIUM'), ],
            [ "type" => "LOW", "text" => __('project.LOW'), ]
        ];
    }
} 

if(!function_exists('TicketStatus')) {
    function TicketStatus()    {
        return [
            [ "type" => "NEW", "text" => __('project.NEW'), ],
            [ "type" => "OPEN", "text" => __('project.OPEN'), ],
            [ "type" => "PENDING", "text" => __('project.PENDING'), ],
            [ "type" => "CLOSED", "text" => __('project.CLOSED'),]
        ];
    }
} 