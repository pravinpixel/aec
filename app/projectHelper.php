
<?php

use App\Models\Admin\Employees;
use App\Models\Customer;
use App\Models\ProjectTeamSetup;
use App\Models\Role;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Storage;

if (!function_exists('getTeamByProjectId')) {
    function getTeamByProjectId($id)
    {
        $teamSetup = ProjectTeamSetup::where('project_id', $id)->pluck('team');
        $employees = [];
        foreach ($teamSetup as $key => $users) {
            foreach ($users as $key => $user_id) {
                $employees[] = Employees::whereId($user_id)->select('image', 'id', 'display_name', 'reference_number')->get()->first()->toArray();
            }
        }
        return $employees;
    }
}
if (!function_exists('getAllAdmin')) {
    function getAllAdmin()
    {
        return Employees::where('job_role', 1)->select('image', 'id', 'display_name', 'reference_number')->get()->toArray();
    }
}

if (!function_exists('issue_id')) {
    function issue_id($issues)
    {
        return 'TIK/' . date('Y') . '/' . $issues + 1;
    }
}

if (!function_exists('Priorities')) {
    function Priorities()
    {
        return [
            ["type" => "CRITICAL", "text" => __('project.CRITICAL'),],
            ["type" => "HIGH", "text" => __('project.HIGH'),],
            ["type" => "MEDIUM", "text" => __('project.MEDIUM'),],
            ["type" => "LOW", "text" => __('project.LOW'),]
        ];
    }
}

if (!function_exists('TicketStatus')) {
    function TicketStatus()
    {
        return [
            ["type" => "NEW", "text" => __('project.NEW'),],
            ["type" => "OPEN", "text" => __('project.OPEN'),],
            ["type" => "PENDING", "text" => __('project.PENDING'),],
            ["type" => "CLOSED", "text" => __('project.CLOSED'),]
        ];
    }
}

if (!function_exists('storagePath')) {
    function storagePath($path)
    {
        return url('/') . Storage::url($path);
    }
}

if (!function_exists('getFileType')) {
    function getFileType($file)
    { 
        $file_type = '.'.ucfirst(explode('/',Storage::mimeType($file))[1]); 
        return $file_type == '.Vnd.openxmlformats-officedocument.spreadsheetml.sheet' ? '.xlsx' : $file_type;
    }
}


if (!function_exists('getFileSize')) {
    function getFileSize($file)
    {
        $bytes =  Storage::size($file);
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        } 
        return $bytes;
    }
}
if(!function_exists('color')) {
    function color()
    {
        return 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')'; #using the inbuilt random function
    }
}
if(!function_exists('getUser')) {
    function getUser($id)
    {
        $User = null;
        $Customer = Customer::find($id);
        $Employees = Employees::find($id);
        if(!is_null($Customer)) {
            $User = $Customer;
        }
        if(!is_null($Employees)) {
            $User = $Employees;
        }
        return $User;
    }
}

if(!function_exists('getUserRole')) {
    function getUserRole($id)
    {
        $User = null;
        $Customer = Customer::find($id);
        $Employees = Employees::find($id);
        if(!is_null($Customer)) {
            $User = $Customer;
        }
        if(!is_null($Employees)) {
            $User = $Employees;
        }
        return Role::find($User->job_role);
    }
}
if(!function_exists('getUserAvatar')) {
    function getUserAvatar($id)
    {
        $user =  getUser($id);
        return '
            <img src="'.$user->image.'" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
        ';
    }
}
