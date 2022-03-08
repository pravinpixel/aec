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
        // project summary
        if($request->project_summary_index == true){
            $permission = Permission::firstOrCreate(['name' => 'project_summary_index']);
            if(!$role->hasPermissionTo('project_summary_index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('project_summary_index');
    
        if($request->project_summary_add == true){
            $permission = Permission::firstOrCreate(['name' => 'project_summary_add']);
            if(!$role->hasPermissionTo('project_summary_add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('project_summary_add');

        if($request->project_summary_edit == true){
            $permission = Permission::firstOrCreate(['name' => 'project_summary_edit']);
            if(!$role->hasPermissionTo('project_summary_edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('project_summary_edit');

        if($request->project_summary_delete == true){
            $permission = Permission::firstOrCreate(['name' => 'project_summary_delete']);
            if(!$role->hasPermissionTo('project_summary_delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('project_summary_delete');

        if($request->technical_estimate_index == true){
            $permission = Permission::firstOrCreate(['name' => 'technical_estimate_index']);
            if(!$role->hasPermissionTo('technical_estimate_index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('technical_estimate_index');
        if($request->technical_estimate_add == true){
            $permission = Permission::firstOrCreate(['name' => 'technical_estimate_add']);
            if(!$role->hasPermissionTo('technical_estimate_add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('technical_estimate_add');
        if($request->technical_estimate_edit == true){
            $permission = Permission::firstOrCreate(['name' => 'technical_estimate_edit']);
            if(!$role->hasPermissionTo('technical_estimate_edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('technical_estimate_edit');
        if($request->technical_estimate_delete == true){
            $permission = Permission::firstOrCreate(['name' => 'technical_estimate_delete']);
            if(!$role->hasPermissionTo('technical_estimate_delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('technical_estimate_delete');
        
        if($request->cost_estimate_index == true){
            $permission = Permission::firstOrCreate(['name' => 'cost_estimate_index']);
            if(!$role->hasPermissionTo('cost_estimate_index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('cost_estimate_index');
        if($request->cost_estimate_add == true){
            $permission = Permission::firstOrCreate(['name' => 'cost_estimate_add']);
            if(!$role->hasPermissionTo('cost_estimate_add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('cost_estimate_add');

        if($request->cost_estimate_edit == true){
            $permission = Permission::firstOrCreate(['name' => 'cost_estimate_edit']);
            if(!$role->hasPermissionTo('cost_estimate_edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('cost_estimate_edit');

        if($request->cost_estimate_delete == true){
            $permission = Permission::firstOrCreate(['name' => 'cost_estimate_delete']);
            if(!$role->hasPermissionTo('cost_estimate_delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('cost_estimate_delete');

        if($request->proposal_sharing_index == true){
            $permission = Permission::firstOrCreate(['name' => 'proposal_sharing_index']);
            if(!$role->hasPermissionTo('proposal_sharing_index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('proposal_sharing_index');

        if($request->proposal_sharing_add == true){
            $permission = Permission::firstOrCreate(['name' => 'proposal_sharing_add']);
            if(!$role->hasPermissionTo('proposal_sharing_add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('proposal_sharing_add');

        if($request->proposal_sharing_edit == true){
            $permission = Permission::firstOrCreate(['name' => 'proposal_sharing_edit']);
            if(!$role->hasPermissionTo('proposal_sharing_edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('proposal_sharing_edit');

        if($request->proposal_sharing_delete == true){
            $permission = Permission::firstOrCreate(['name' => 'proposal_sharing_delete']);
            if(!$role->hasPermissionTo('proposal_sharing_delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('proposal_sharing_delete');


        if($request->customer_response_index == true){
            $permission = Permission::firstOrCreate(['name' => 'customer_response_index']);
            if(!$role->hasPermissionTo('customer_response_index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customer_response_index');

        if($request->customer_response_add == true){
            $permission = Permission::firstOrCreate(['name' => 'customer_response_add']);
            if(!$role->hasPermissionTo('customer_response_add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customer_response_add');

        if($request->customer_response_edit == true){
            $permission = Permission::firstOrCreate(['name' => 'customer_response_edit']);
            if(!$role->hasPermissionTo('customer_response_edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customer_response_edit');

        if($request->customer_response_delete == true){
            $permission = Permission::firstOrCreate(['name' => 'customer_response_delete']);
            if(!$role->hasPermissionTo('customer_response_delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customer_response_delete');

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
