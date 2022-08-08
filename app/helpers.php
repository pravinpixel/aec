<?php

use Illuminate\Support\Facades\Auth;
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
                return "<span class='badge badge-outline-danger rounded-pill'>Change Request</span>";
                break;
            default:
                $uValue = (string)ucfirst($value);
                return "<span class='badge badge-outline-danger rounded-pill'>{$uValue}</span>";
        }
    }
}
