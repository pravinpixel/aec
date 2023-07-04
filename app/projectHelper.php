
<?php

use App\Http\Controllers\Sharepoint\SharepointController;
use App\Jobs\emailJob;
use App\Models\Admin\Employees;
use App\Models\AecUsers;
use App\Models\CheckSheet;
use App\Models\Customer;
use App\Models\Issues;
use App\Models\LiveProjectSubSubTasks;
use App\Models\LiveProjectSubTasks;
use App\Models\Project;
use App\Models\ProjectTeamSetup;
use App\Models\VariationOrder;
use App\Models\VariationOrderVersions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

if (!function_exists('getTeamByProjectId')) {
    function getTeamByProjectId($id)
    {
        $teamSetup = ProjectTeamSetup::where('project_id', $id)->pluck('team');
        $employees = [];
        foreach ($teamSetup as $key => $users) {
            foreach ($users as $key => $user_id) {
                $employees[] = Employees::with('AecUsers')->find($user_id)->AecUsers->toArray();
            }
        }
        return $employees;
    }
}
if (!function_exists('getAllAdmin')) {
    function getAllAdmin()
    {
        return AecUsers::where('job_role', '!=', 0)->where('job_role', '!=', 6)->get()->toArray();
    }
}

if (!function_exists('issue_id')) {
    function issue_id($issues)
    {
        return ('TKT/' . date('Y') . '/' . $issues + 1);
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
        if (Storage::exists($file) === false) {
            return "";
        }
        $file_type = '.' . ucfirst(explode('/', Storage::mimeType($file))[1]);
        if ($file_type == '.Vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            return '.xlsx';
        } elseif ($file_type == '.Svg+xml') {
            return '.svg';
        }
        return $file_type;
    }
}


if (!function_exists('getFileSize')) {
    function getFileSize($file)
    {
        if (Storage::exists($file) === false) {
            return 0;
        }
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
if (!function_exists('select_status')) {
    function select_status($status, $row)
    {
        return  $status == $row->status ? 'selected' : '';
    }
}
if (!function_exists('color')) {
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
if (!function_exists('getCustomerById')) {
    function getCustomerById($id)
    {
        return Customer::find($id);
    }
}
if (!function_exists('getEmployeeById')) {
    function getEmployeeBtId($id)
    {
        return Employees::find($id);
    }
}
if (!function_exists('getUser')) {
    function getUser($id)
    {
        $User = null;
        $Customer = Customer::find($id);
        $Employees = Employees::find($id);
        if (!is_null($Customer)) {
            $User = $Customer;
        }
        if (!is_null($Employees)) {
            $User = $Employees;
        }
        return $User;
    }
}
if (!function_exists('getUserName')) {
    function getUserName($id)
    {
        $User = null;
        $Customer = Customer::find($id);
        $Employees = Employees::find($id);
        if (!is_null($Customer)) {
            $User = $Customer->first_name;
        }
        if (!is_null($Employees)) {
            $User = $Employees->full_name;
        }
        return $User;
    }
}

if (!function_exists('getUserRole')) {
    function getUserRole($id)
    { 
        return AecUser($id)->Role;
    }
}
if (!function_exists('getUserAvatar')) {
    function getUserAvatar($id)
    {
        $user =  AecUser($id);
        return '<img src="' . $user->image . '" class="rounded-circle img-thumbnail avatar-sm" alt="friend">';
    }
}
if (!function_exists('getCustomerAvatar')) {
    function getCustomerAvatar($id)
    {
        $user =  AecUser($id);
        return '<img src="' . $user->image . '" class="rounded-circle img-thumbnail avatar-sm" alt="friend">';
    }
}
if (!function_exists('VariationStatus')) {
    function VariationStatus($status)
    {
        if ($status == 'NEW') {
            return '<span class="badge bg-primary rounded-pill">New</span>';
        }
        if ($status == 'SENT') {
            if (AuthUser() == 'ADMIN') {
                return '<span class="badge bg-success rounded-pill">Sent</span>';
            } else {
                return '<span class="badge bg-success rounded-pill">Awaiting</span>';
            }
        }
        if ($status == 'OBSOLETE') {
            return '<span class="badge bg-dark rounded-pill">OBSOLETE</span>';
        }
        if ($status == 'ACCEPT') {
            return '<span class="badge bg-success rounded-pill">Accepted</span>';
        }
        if ($status == 'CHANGE_REQUEST') {
            return '<span class="badge bg-warning text-dark rounded-pill">Change request</span>';
        }
        if ($status == 'DENY') {
            return '<span class="badge bg-danger  rounded-pill">Denied</span>';
        }
        return '<span class="badge bg-dark rounded-pill">NAN</span>';
    }
}

if (!function_exists('variationOrderMenu')) {
    function variationOrderMenu($row)
    {
        if (AuthUser() == 'ADMIN') {
            if ($row->status == 'NEW') {
                return  '
                    <button type="button" onclick=ViewVersion(' . $row->id . ',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                    <button type="button" onclick=ViewVersion(' . $row->id . ',"EDIT") class="dropdown-item"><i class="fa fa-pen me-1"></i> Edit</button>
                    <button type="button" onclick="SendMailVersion(' . $row->id . ',this)" class="dropdown-item"><i class="fa fa-envelope me-1"></i> Send</button>
                    <button type="button" onclick="DeleteVersion(' . $row->id . ')" class="dropdown-item text-danger"><i class="fa fa-trash me-1"></i> Delete</button>
                ';
            }
            if ($row->status == 'SENT') {
                return  '
                    <button type="button" onclick=ViewVersion(' . $row->id . ',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                ';
            }
            if ($row->status == 'OBSOLETE') {
                return  '
                    <button type="button" onclick=ViewVersion(' . $row->id . ',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                ';
            }
            if ($row->status == 'RESPONSE' || $row->status == 'CHANGE_REQUEST') {
                return  '
                    <button type="button" onclick=ViewVersion(' . $row->id . ',"DUPLICATE") class="dropdown-item"><i class="fa fa-clone me-1"></i> Duplicate</button>
                    <button type="button" onclick=ViewVersion(' . $row->id . ',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>
                ';
            }
        }
        return  '<button type="button" onclick=ViewVersion(' . $row->id . ',"VIEW") class="dropdown-item"><i class="fa fa-eye me-1"></i> View </button>';
    }
}
if (!function_exists('getIssuesByUserId')) {
    function getIssuesByUserId($id)
    {
        $project_ids =  Project::when(AuthUser() == 'CUSTOMER', function ($q) use ($id) {
            $q->where('customer_id', $id);
        })->pluck('id');
        return Issues::with('VariationOrder', 'Project', 'Project.Customer')
            ->whereIn('project_id', $project_ids)
            ->when(AuthUser() == 'CUSTOMER', function ($q) {
                $q->where('type', 'EXTERNAL')->whereIn('status', ['OPEN', 'NEW']);
            })
            ->when(AuthUser() == 'ADMIN' && AuthUserData()->job_role != 1, function ($q) {
                $q->where('assignee_id', AuthUserData()->id)
                    ->orWhere('request_id', AuthUserData()->id);
                // ->orWhere('tags', AuthUserData()->id);
                // in_array( AuthUserData()->id, json_decode($issue->tags));
            })
            ->select('*');
    }
}
if (!function_exists('getIssuesByProjectId')) {
    function getIssuesByProjectId($id, $type = null)
    {
        return Issues::with('VariationOrder')
            ->where('project_id', $id)
            ->when(isset($type) && !empty($type), function ($q) use ($type) {
                $q->where('status', $type);
            })
            ->when(AuthUser() == 'CUSTOMER', function ($q) {
                $q->where('type', 'EXTERNAL');
            })
            ->when(AuthUser() == 'ADMIN' && AuthUserData()->job_role != 1, function ($q) {
                $q->where('assignee_id', AuthUserData()->id)->orWhere('request_id', AuthUserData()->id);
            })
            ->select('*');
    }
}
if (!function_exists('ProjectDocuments')) {
    function ProjectDocuments($id)
    {
        $controller = new SharepointController();
        return  $controller->listAllFolder($id);
    }
}

if (!function_exists('DatePickerFormat')) {
    function DatePickerFormat($date)
    {
        return  Carbon::parse(str_replace('/', '-', $date))->format('Y-m-d');
    }
}

if (!function_exists('sendMail')) {
    function sendMail($modal, $data)
    {
        return dispatch(new emailJob(new $modal(), $data));
    }
}

if (!function_exists('issuesCount')) {
    function issuesCount($modal, $type)
    {
        $modal = Issues::where('project_id', $modal->id)->select('*');
        if ($type == 'ALL') {
            if (Admin()->job_role != 1) {
                $count =  $modal->where('assignee_id', Admin()->id)
                    ->orWhere('request_id', AuthUserData()->id)->count();
            } else {
                $count =  $modal->count();
            }
            return '<span class="badge bg-danger">' . $count . '</span>';
        }

        return '<span class="badge bg-danger">0</span>';
    }
}


if (!function_exists('getCompleteTaskCountByProjectId')) {
    function getCompleteTaskCountByProjectId($project_id, $type = null)
    {
        return LiveProjectSubSubTasks::where('project_id', $project_id)
            ->when(isset($type) && !empty($type), function ($q) use ($type) {
                $q->where('status', $type);
            })->count();
    }
}

if (!function_exists('getMilestoneCountByProjectId')) {
    function getMilestoneCountByProjectId($project_id, $type = null)
    {
        return LiveProjectSubTasks::where('project_id', $project_id)
            ->when(isset($type) && !empty($type), function ($q) use ($type) {
                $q->where('progress_percentage', 100);
            })->count();
    }
}
if (!function_exists('getVariationOrderByProjectId')) {
    function getVariationOrderByProjectId($id)
    {
        return VariationOrder::with('Issues', 'VariationOrderVersions')
            ->where('project_id', $id)
            ->latest()->get();
    }
}

if (!function_exists('hasIssueReadPermission')) {
    function hasIssueReadPermission($issue)
    {
        if (AuthUser() === 'CUSTOMER' && $issue->type === 'EXTERNAL') {
            return true;
        } else {
            if ($issue->type === 'EXTERNAL') {
                return true;
            }
            $employees = [];
            if ($issue->tags) {
                try {
                    foreach (json_decode($issue->tags ?? []) as $key => $user_id) {
                        $employees[] = Employees::with('AecUsers')->find($user_id)->AecUsers->toArray();
                    }
                    if (in_array(AuthUserData()->id, json_decode($issue->tags))) {
                        return true;
                    } else {
                        return false;
                    }
                } catch (\Throwable $th) {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    if (!function_exists('getVoCostByProjectId')) {
        function getVoCostByProjectId($id)
        {
            $data = VariationOrderVersions::where('project_id', $id)->get();
            $count = 0;
            if (count($data)) {
                foreach ($data as $row) {
                    $count  += (int)$row->price  * (int) $row->hours;
                }
            }
            return $count;
        }
    }
    if (!function_exists('getVOrdersByProjectId')) {
        function getVOrdersByProjectId($id)
        {
            return VariationOrderVersions::where('project_id', $id)->get();
        }
    }
    if (!function_exists('checSheetList')) {
        function checSheetList()
        {
            return CheckSheet::all();
        }
    }
    if (!function_exists('AecUsers')) {
        function AecUsers($ids)
        {
            return AecUsers::with('Role')->whereIn('id',$ids)->get();
        }
    }

    if (!function_exists('AecUser')) {
        function AecUser($id)
        {
            return AecUsers::with('Role')->find($id);
        }
    }
    if (!function_exists('AecAuthUser')) {
        function AecAuthUser()
        {
           return AuthUserData()->AecUsers;             
        }
    }
}