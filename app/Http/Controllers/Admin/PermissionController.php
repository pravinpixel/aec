<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permission($id)
    {
        try {
            $lims_role_data = Role::find($id);
            if(!empty($lims_role_data)) {
                $permissions = Role::findByName($lims_role_data->name)->permissions;
                foreach ($permissions as $permission)
                    $all_permission[] = $permission->name;
                if(empty($all_permission))
                    $all_permission[] = 'dummy text';
                return view('admin.setting-tabs.Permission.index', compact('lims_role_data', 'all_permission'));
            }
            else
                return  response(['status' => false, 'msg' => __('global.item_not_found')]);
        } catch(Exception $ex){
            Log::error($ex);
            return  response(['status' => false, 'msg' => __('global.something')]);
        }
        
    }

    public function setPermission($id, Request $request)
    {
        $role = Role::firstOrCreate(['id' => $id]);
        
        if($request->enquiry_index == true){
            $permission = Permission::firstOrCreate(['name' => 'enquiry_index']);
            if(!$role->hasPermissionTo('enquiry_index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('enquiry_index');

        if($request->enquiry_add == true){
            $permission = Permission::firstOrCreate(['name' => 'enquiry_add']);
            if(!$role->hasPermissionTo('enquiry_add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('enquiry_add');

        if($request->enquiry_edit == true){
            $permission = Permission::firstOrCreate(['name' => 'enquiry_edit']);
            if(!$role->hasPermissionTo('enquiry_edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('enquiry_edit');

        if($request->enquiry_delete == true){
            $permission = Permission::firstOrCreate(['name' => 'enquiry_delete']);
            if(!$role->hasPermissionTo('enquiry_delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('enquiry_delete');

        return response(['status' => true, 'msg'=> __('global.permission_updated')]);
    }

    public function getPermission($id)
    {
        $role = Role::find($id);
        if(!empty($role)) {
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[$permission->name] = true;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
           
            return response(['status' => true, 'permission' => (object)$all_permission]);
        }
    }

    public function destroy($id)
    {
        $lims_role_data = Role::find($id);
        $lims_role_data->is_active = false;
        $lims_role_data->save();
        return redirect('role')->with('not_permitted', 'Data deleted successfully');
    }
}
