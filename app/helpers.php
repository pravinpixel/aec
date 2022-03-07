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
       return $role->hasPermissionTo($permission);
    }
}

if(!function_exists('userRole')){
    function userRole()
    {
        $user =  Admin();
        $role = Role::find($user->job_role);
        return $role;
    }
}