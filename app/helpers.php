<?php

use App\Helper\Notify;
use App\Models\Enquiry;
use App\Models\Inbox;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

if(! function_exists('Customer')) {
    function Customer() {
        return Auth::guard('customers')->user();
    }
}
if(! function_exists('Admin')) {
    function Admin() {
        return Auth::user();
    }
}
if(!function_exists('userHasAccess')) {
    function userHasAccess($permission) {
       $user =  Admin();
       $role = Role::find($user->job_role);
       if($role->slug == 'admin'){
           return true;
       }
       return $role->hasPermissionTo($permission);
    }
}

if(!function_exists('userRole')){
    function userRole()
    {
        $user =  Admin();
        $role = array();
        if($user != ""){
            $role = Role::find($user->job_role);
        }

        return $role;
    }
}

if(!function_exists('proposalStatusBadge')) {
    function proposalStatusBadge($value) {
        switch($value){
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

if(!function_exists('permissionHeader')) {
    function permissionHeader($str){
        return  ucwords(str_replace('_', ' ',$str));
    }
}

if(!function_exists('slug')) {
    function slug($title){
        return strtolower(str_replace(' ', '-', $title));
    }
}

if(!function_exists('AuthUser')) {
    function AuthUser(){
        if(!is_null(Admin()))   {
            return "ADMIN";
        }
        if(!is_null(Customer()))   {
            return "CUSTOMER";
        }
    }
}

if(!function_exists('str_replace_all')) {
    function str_replace_all($key, $value, $subject) {
        $subject = str_replace($key, $value, $subject);
        return $subject;
    }
}

if(!function_exists('getCustomerByEnquiryId')) {
    function getCustomerByEnquiryId($id)
    {
        return Enquiry::with('customer')->findOrFail($id)->customer;
    }
}
if(! function_exists('SetDateFormat')) {
    function SetDateFormat($date) {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
if(! function_exists('SetDateTimeFormat')) {
    function SetDateTimeFormat($date) {
        return Carbon::parse($date)->format('d/m/Y H:m:s');
    }
}

if(!function_exists('getEnquiryChatCount')) {
    function getEnquiryChatCount($user_type, $module_name, $module_id){
        $count = Notify::getModuleMessagesCount([
            'user_type'   => $user_type,
            'module_name' => $module_name,
            'module_id'   => $module_id,
        ]);
        return $count;
    }
}

if(!function_exists('getModuleMenuMessagesCount')) {
    function getModuleMenuMessagesCount($module_name, $module_id, $menu_name,$type){
        $count = Notify::getModuleMenuMessagesCount([
            'user_type'   => AuthUser(),
            'module_name' => $module_name,
            'module_id'   => $module_id,
            'menu_name'   => $menu_name
        ]);
        // element
        if($type == 'element') {
            if($count != 0) {
                return'
                    <small class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        '.$count.'
                    </small>
                ';
            } else {
                return '';
            }
        }
        return (int) $count;
    }
}
if(!function_exists('getNotificationMessages')) {
    function getNotificationMessages(){
        return Inbox::where([
            'receiver_role' => ucfirst(strtolower(AuthUser())),
            'read_status'   => 0
        ])->get();
    }
}
if(!function_exists('getEnquiryBtId')) {
    function getEnquiryBtId($id){
       return  Enquiry::find($id);
    }
}

if(!function_exists('setFileIcon')) {
    function setFileIcon($path){
        if (Storage::exists($path)) {
            return '<img src="'.url("storage/app/")."/".$path.'" width="20px">';
        } else {
            return '<img src="https://cdn-icons-png.flaticon.com/512/569/569800.png" width="20px">';
        }
    }
}
