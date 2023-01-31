
<?php

use App\Models\Admin\Employees;
use App\Models\ProjectTeamSetup;

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