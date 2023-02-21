
<?php

use App\Models\Admin\Employees;
use App\Models\Customer;
use App\Models\ProjectTeamSetup;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Random\Randomizer;

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
        if($file_type == '.Vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            return '.xlsx';
        } elseif($file_type == '.Svg+xml') {
            return '.svg';
        }
        return $file_type ;
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
if(!function_exists('select_status')) {
    function select_status ($status,$row) {
        return  $status == $row->status ? 'selected' : '';
    }
}
if(!function_exists('color')) {
    function color()
    {
        $input = array(
            "#5D3891",
            "#D61355",
            "#F2921D",
            "#A61F69",
            "#00425A",
            "#301E67",
            "#0081B4",
        );
        return $input[array_rand($input)];
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

if (!function_exists('VariationStatus')) {
    function VariationStatus($status)
    {
        if($status == 'NEW') {
            return '<span class="badge bg-primary rounded-pill">New</span>';
        }
        if($status == 'SENT') {
            if(AuthUser() == 'ADMIN') {
                return '<span class="badge bg-success rounded-pill">Sent</span>';
            } else {
                return '<span class="badge bg-success rounded-pill">Awaiting</span>';
            }
        }
        if($status == 'OBSOLETE') {
            return '<span class="badge bg-danger rounded-pill">OBSOLETE</span>';
        }
        if($status == 'ACCEPT') {
            return '<span class="badge bg-success rounded-pill">Accepted</span>';
        }
        if($status == 'CHANGE_REQUEST') {
            return '<span class="badge bg-warning text-dark rounded-pill">Change request</span>';
        }
        if($status == 'DENY') {
            return '<span class="badge bg-danger  rounded-pill">Denied</span>';
        }
        return '<span class="badge bg-dark rounded-pill">NAN</span>';
    }
}

if (!function_exists('variationOrderMenu')) {
    function variationOrderMenu($row)
    {
        if(AuthUser() == 'ADMIN') {
            if($row->status == 'NEW') {
                return  '
                    <button onclick=ViewVersion('.$row->id.',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                    <button onclick=ViewVersion('.$row->id.',"EDIT") class="dropdown-item"><i class="fa fa-pen me-1"></i> Edit</button>
                    <button onclick="SendMailVersion('.$row->id.',this)" class="dropdown-item"><i class="fa fa-envelope me-1"></i> Send</button>
                    <button onclick="DeleteVersion('.$row->id.')" class="dropdown-item text-danger"><i class="fa fa-trash me-1"></i> Delete</button>
                ';
            }
            if($row->status == 'SENT') {
                return  '
                    <button onclick=ViewVersion('.$row->id.',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                ';
            }
            if($row->status == 'OBSOLETE') {
                return  '
                    <button onclick=ViewVersion('.$row->id.',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                ';
            }
            if($row->status == 'RESPONSE') {
                return  '
                    <button onclick=ViewVersion('.$row->id.',"DUPLICATE") class="dropdown-item"><i class="fa fa-clone me-1"></i> Duplicate</button>
                    <button onclick=ViewVersion('.$row->id.',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                ';
            }
        }
        return  '<button onclick=ViewVersion('.$row->id.',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>';
    }
}