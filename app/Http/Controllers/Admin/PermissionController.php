<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permission()
    {
        $lims_role_data = Role::find(1);
        if(!empty($lims_role_data)) {
            $permissions = Role::findByName($lims_role_data->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            return view('admin.setting-tabs.Permission.index', compact('lims_role_data', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function setPermission(Request $request)
    {
 
        $role = Role::firstOrCreate(['id' => $request['role_id']]);

        if($request->has('products-index')){
            $permission = Permission::firstOrCreate(['name' => 'enquiry-index']);
            if(!$role->hasPermissionTo('enquiry-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('enquiry-index');

        return redirect('role')->with('message', 'Permission updated successfully');
    }

    public function destroy($id)
    {
        $lims_role_data = Role::find($id);
        $lims_role_data->is_active = false;
        $lims_role_data->save();
        return redirect('role')->with('not_permitted', 'Data deleted successfully');
    }
}
