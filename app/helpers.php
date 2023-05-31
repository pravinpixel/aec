<?php
include 'projectHelper.php';

use App\Helper\Notify;
use App\Models\Admin\Employees;
use App\Models\Admin\MailTemplate;
use App\Models\Admin\PropoalVersions;
use App\Models\Customer;
use App\Models\Documentary\Documentary;
use App\Models\Enquiry;
use App\Models\Inbox;
use App\Models\Project;
use App\Models\Role as ModelsRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

if (!function_exists('Customer')) {
    function Customer()
    {
        return Auth::guard('customers')->user();
    }
}
if (!function_exists('Admin')) {
    function Admin()
    {
        return Auth::user();
    }
}
if (!function_exists('userHasAccess')) {
    function userHasAccess($permission)
    {
        $user =  Admin();
        $role = Role::find($user->job_role);
        if ($role->slug == 'admin') {
            return true;
        }
        return $role->hasPermissionTo($permission);
    }
}

if (!function_exists('userRole')) {
    function userRole()
    {
        $user =  Admin();
        if ($user != "") {
            return Role::find($user->job_role);
        }
        return [
            "name"   => "Customer",
            "status" => "1",
            "slug"   => "customer",
        ];
    }
}
if (!function_exists('userRoleName')) {
    function userRoleName()
    {
        $user =  Admin();
        $role = array();
        if ($user != "") {
            $role = Role::find($user->job_role);
        }
        return strtoupper(str_replace('_', '_', $role->slug));
    }
}
if (!function_exists('colors')) {
    function colors()
    {
        return [
            "#673ab7",
            "#ff9800",
            "#f85a7e",
            "#00bcd4",
            // "#a61120",
            // "#f94144",
            // "#f97d5b",
            // "#f3722c",
            // "#f8961e",
            // "#f9c74f",
            // "#90be6d",
            // "#43aa8b",
            // "#800080",
            // "#f20089",
            // "#5c0099",
            // "#0c326c",
            // "#4169e1",
            // "#2196F3",
            // "#00540e",
            // "#03071e",
        ];
    }
}
if (!function_exists('proposalStatusBadge')) {
    function proposalStatusBadge($value)
    {
        switch ($value) {
            case "not_send":
                return "<span class='badge badge-outline-info rounded-pill'>Awaiting</span>";
                break;
            case "approved":
                return "<span class='badge badge-outline-success rounded-pill'>Approved</span>";
                break;
            case "obsolete":
                return "<span class='badge badge-outline-danger rounded-pill'>Obsolete</span>";
                break;
            case "denied":
                return "<span class='badge  badge-outline-danger rounded-pill'>Denied</span>";
                break;
            case "change_request":
                return "<span class='badge badge-outline-purple rounded-pill'>Change Request</span>";
                break;
            default:
                $uValue = (string)ucfirst($value);
                return "<span class='badge badge-outline-danger rounded-pill'>{$uValue}</span>";
        }
    }
}

if (!function_exists('permissionHeader')) {
    function permissionHeader($str)
    {
        return  ucwords(str_replace('_', ' ', $str));
    }
}

if (!function_exists('slug')) {
    function slug($title)
    {
        return strtolower(str_replace(' ', '-', $title));
    }
}

if (!function_exists('AuthUser')) {
    function AuthUser()
    {
        if (!is_null(Admin())) {
            return strtoupper(Auth::user()->role->slug);
        }
        if (!is_null(Customer())) {
            return "CUSTOMER";
        }
    }
}

if (!function_exists('AuthUserData')) {
    function AuthUserData()
    {
        if (!is_null(Admin())) {
            return Auth::user();
        }
        if (!is_null(Customer())) {
            return Auth::guard('customers')->user();
        }
    }
}



if (!function_exists('str_replace_all')) {
    function str_replace_all($key, $value, $subject)
    {
        $subject = str_replace($key, $value, $subject);
        return $subject;
    }
}
if (!function_exists('getCustomerByEnquiryId')) {
    function getCustomerByEnquiryId($id)
    {
        try {
            return Enquiry::with('customer')->find($id)->customer;
        } catch (\Throwable $th) {
            return Project::with('customer')->find($id)->customer;
        }
    }
}
if (!function_exists('getCustomerByProjectId')) {
    function getCustomerByProjectId($id)
    {
        try {
            return Project::with('customer')->find($id)->customer;
        } catch (\Throwable $th) {
            return Enquiry::with('customer')->find($id)->customer;
        }
    }
}
if (!function_exists('getProjectId')) {
    function getProjectId($id)
    {
        return Project::findOrFail($id);
    }
}
if (!function_exists('SetDateFormat')) {
    function SetDateFormat($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
if (!function_exists('SetDateTimeFormat')) {
    function SetDateTimeFormat($date)
    {
        return Carbon::parse($date)->format('d/m/Y H:m:s');
    }
}

if (!function_exists('getModuleChatCount')) {
    function getModuleChatCount($user_type, $module_name, $module_id)
    {
        $count = Notify::getModuleMessagesCount([
            'user_type'   => $user_type,
            'module_name' => $module_name,
            'module_id'   => $module_id,
        ]);
        return $count;
    }
}

if (!function_exists('getModuleMenuMessagesCount')) {
    function getModuleMenuMessagesCount($module_name, $module_id, $menu_name, $type)
    {
        $count = Notify::getModuleMenuMessagesCount([
            'user_type'   => AuthUser(),
            'module_name' => $module_name,
            'module_id'   => $module_id,
            'menu_name'   => $menu_name
        ]);
        // element
        if ($type == 'element') {
            if ($count != 0) {
                return '
                    <small class="position-absolute text-white top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        ' . $count . '
                    </small>
                ';
            } else {
                return '';
            }
        }
        return (int) $count;
    }
}
if (!function_exists('getNotificationMessages')) {
    function getNotificationMessages()
    {
        return Inbox::where([
            'receiver_role' => ucfirst(strtolower(AuthUser())),
            'read_status'   => 0
        ])->get();
    }
}
if (!function_exists('getEnquiryBtId')) {
    function getEnquiryBtId($id)
    {
        return  Enquiry::find($id);
    }
}
if (!function_exists('getEmployeeById')) {
    function getEmployeeById($id)
    {
        return  Employees::find($id);
    }
}
if (!function_exists('getCustomerById')) {
    function getCustomerById($id)
    {
        return  Customer::find($id);
    }
}


if (!function_exists('setFileIcon')) {
    function setFileIcon($path)
    {
        if (Storage::exists($path)) {
            return '<img src="' . url("storage/app/") . "/" . $path . '" width="20px">';
        } else {
            return '<img src="https://cdn-icons-png.flaticon.com/512/569/569800.png" width="20px">';
        }
    }
}
if (!function_exists('changePreviousProposalStatus')) {
    function changePreviousProposalStatus($enquiry_id)
    {
        $MailTemplate = MailTemplate::where("enquiry_id", $enquiry_id)->get();
        if (count($MailTemplate) > 0) {
            foreach ($MailTemplate as $proposal) {
                $proposal->update([
                    "status" => 'obsolete'
                ]);
            }
        }
        $previousVersions = PropoalVersions::where("enquiry_id", $enquiry_id)->get();
        if (count($previousVersions) > 0) {
            foreach ($previousVersions as $proposal) {
                $proposal->update([
                    "status" => 'obsolete'
                ]);
            }
        }
        return Enquiry::find($enquiry_id)->update(["customer_response" => 0]);
    }
}
if (!function_exists('changeProposalStatus')) {
    function changeProposalStatus($data)
    {
        MailTemplate::find($data['proposal_id'])->update([
            "proposal_status" => $data['proposal_status']
        ]);
        $PropoalVersions = PropoalVersions::where('proposal_id', $data['proposal_id'])->first();
        if (!is_null($PropoalVersions)) {
            $PropoalVersions->update([
                "proposal_status" => $data['proposal_status']
            ]);
        }
        return Enquiry::find($data['enquiry_id'])->update(["customer_response" => 0]);
    }
    if (!function_exists('slugable')) {
        function slugable($txt, $id)
        {
            return strtoupper(str_replace([' ', '-', '_'], "_", $txt) . '_000' . $id);
        }
    }
    if (!function_exists('getManagers')) {
        function getManagers()
        {
            $role = ModelsRole::where('slug', 'project_manager')->first();
            $managers = [];
            if (!empty($role)) {
                $managers = Employees::where('job_role', $role->id)->select('display_name', 'id')->get()->toArray();
            }
            return $managers;
        }
    }

    if (!function_exists('Project')) {
        function Project()
        {
            return session()->get('current_project');
        }
    }
    if (!function_exists('generateProgressBar')) {
        function generateProgressBar($count, $class = null)
        {
            if ($count == 0) {
                $progress_bar = '
                    <div class="progress border border-white shadow" style="width: 100px">
                        <div class="' . $class . ' progress-bar progress-bar-striped bg-secondary text-white" role="progressbar" style="width: 100%;">0%</div>
                    </div>
                ';
            } else {
                $width = $count < 25 ? 25 : $count;
                $progress_bar = '
                    <div class="progress border border-darkgreen shadow" style="width: 100px">
                        <div class="' . $class . ' progress-bar progress-bar-striped progress-bar-animated darkgreen" role="progressbar" style="width: ' . $width . '%;" aria-valuenow="' . $width . '" aria-valuemin="0" aria-valuemax="100">' . (int)$count . '%</div>
                    </div>
                ';
            }
            return minifyHtml($progress_bar);
        }
    }
    if (!function_exists('minifyHtml')) {
        function minifyHtml($buffer)
        {

            $search = [
                '/\>[^\S ]+/s',
                '/[^\S ]+\</s',
                '/(\s)+/s',
                '/<!--(.|\s)*?-->/'
            ];

            $replace = [
                '>',
                '<',
                '\\1',
                ''
            ];

            $buffer = preg_replace($search, $replace, $buffer);

            return $buffer;

            // ob_start("sanitize_output");
        }
    }

    if (!function_exists('formatBuildingComponentJSON')) {
        function formatBuildingComponentJSON($data)
        {
            foreach ($data as $key => $value) {
                if (count($value['Details']) === 0) {
                    unset($data[$key]);
                }
            }
            return json_decode(json_encode($data), FALSE);
        }
    }

    if (!function_exists('bindProposalContent')) {
        function bindProposalContent($enquiry, $documentary, $version)
        {
            $documentary_content = $documentary->documentary_content;
            $variables = [
                '$document_title'           => $documentary->documentary_title,
                '$enquiry_date'             => $enquiry->enquiry_date,
                '$project_name'             => $enquiry->project_name,
                '$project_street_name'      => isset($enquiry->project->site_address) == false ? "" : $enquiry->project->site_address,
                '$project_city'             => isset($enquiry->project->city) == false ? "" : $enquiry->project->city,
                '$project_state'            => isset($enquiry->project->state) == false ? "" : $enquiry->project->state,
                '$project_country'          => isset($enquiry->project->country) == false ? "" : $enquiry->project->country,
                '$project_zipcode'          => isset($enquiry->project->zipcode) == false ? "" : $enquiry->project->zipcode,
                '$no_of_building'           => isset($enquiry->project->no_of_building) == false ? "" : $enquiry->project->no_of_building,
                '$project_date'             => $enquiry->project_date,
                '$project_delivery_date'    => isset($enquiry->project->delivery_date) == false ? "" : $enquiry->project->delivery_date,
                '$project_in_charge_name'   => isset($enquiry->project->contact_person) == false ? "" : $enquiry->project->contact_person,
                '$project_mobile_no'        => isset($enquiry->project->project_mobile_no) == false ? "" : $enquiry->project->project_mobile_no,
                '$company_name'             => $enquiry->company_name,
                '$customer_organization_no' => $enquiry->customer->organization_no,
                '$customer_street_name'     => $enquiry->site_address,
                '$customer_city'            => $enquiry->city,
                '$customer_state'           => $enquiry->state,
                '$customer_country'         => $enquiry->country,
                '$customer_zipcode'         => $enquiry->zipcode,
                '$contact_person'           => $enquiry->customer->contact_person,
                '$customer_email'           => $enquiry->customer->email,
                '$customer_mobile_no'       => $enquiry->customer->mobile_no,
                '$admin_name'               => config('global.admin_name'),
                '$admin_role'               => config('global.admin_role'),
                '$admin_email'              => config('global.admin_email'),
                '$admin_mobile_no'          => config('global.admin_mobile_no'),
                '$logo_image_with_url'      => '<img width="150px" src="' . config('global.logo') . '" alt="AEC PREFAB LOGO" />',
                '$signature'                => '<img width="150px" src="' . config('global.signature') . '" alt="signature" />',
                '$company_website'          => url(''),
                '$today_date'               => date("d-m-Y"),
                '$calculated_total_price'   => $enquiry->costEstimate->total_cost,
                '$building_comp_1_name'     => "",
                '$building_comp_2_name'     => "",
                '$building_comp_3_name'     => "",
                '$building_comp_4_name'     => "",
                '$building_comp_1_area'     => "",
                '$building_comp_2_area'     => "",
                '$building_comp_3_area'     => "",
                '$building_comp_4_area'     => "",
                '$offer_number'             => "",
                '$rev_number'               => "<version>" . $version . "</version>",
            ];
            foreach ($variables as $key => $value) {
                $documentary_content = str_replace_all($key, $value, $documentary_content);
            }
            return $documentary_content;
        }
    }
}
