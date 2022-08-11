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
            $li_role_data = Role::find($id);
            $appPermissions = config('permission.permissions');
            if (!empty($li_role_data)) {
                $permissions = Role::findByName($li_role_data->name)->permissions;
                foreach ($permissions as $permission)
                    $all_permission[] = $permission->name;
                if (empty($all_permission))
                    $all_permission[] = 'dummy text';
                return view('admin.setting-tabs.Permission.index', compact('li_role_data', 'appPermissions', 'all_permission'));
            } else
                return  response(['status' => false, 'msg' => __('global.item_not_found')]);
        } catch (Exception $ex) {
            Log::error($ex);
            return  response(['status' => false, 'msg' => __('global.something')]);
        }
    }

    public function setPermission($id, Request $request)
    {
        // dd($request->all());
        $role = Role::firstOrCreate(['id' => $id]);

        if ($request->enquiry_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'enquiry_index']);
            if (!$role->hasPermissionTo('enquiry_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('enquiry_index');

        if ($request->enquiry_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'enquiry_add']);
            if (!$role->hasPermissionTo('enquiry_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('enquiry_add');

        if ($request->enquiry_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'enquiry_edit']);
            if (!$role->hasPermissionTo('enquiry_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('enquiry_edit');

        if ($request->enquiry_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'enquiry_delete']);
            if (!$role->hasPermissionTo('enquiry_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('enquiry_delete');
        // project summary

        // sale 

        if ($request->sale_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'sale_index']);
            if (!$role->hasPermissionTo('sale_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('sale_index');

        if ($request->sale_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'sale_add']);
            if (!$role->hasPermissionTo('sale_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('sale_add');

        if ($request->sale_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'sale_edit']);
            if (!$role->hasPermissionTo('sale_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('sale_edit');

        if ($request->sale_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'sale_delete']);
            if (!$role->hasPermissionTo('sale_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('sale_delete');

        //end sale
        if ($request->project_summary_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_summary_index']);
            if (!$role->hasPermissionTo('project_summary_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_summary_index');

        if ($request->project_summary_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_summary_add']);
            if (!$role->hasPermissionTo('project_summary_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_summary_add');

        if ($request->project_summary_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_summary_edit']);
            if (!$role->hasPermissionTo('project_summary_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_summary_edit');

        if ($request->project_summary_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_summary_delete']);
            if (!$role->hasPermissionTo('project_summary_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_summary_delete');

        if ($request->technical_estimate_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'technical_estimate_index']);
            if (!$role->hasPermissionTo('technical_estimate_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('technical_estimate_index');
        if ($request->technical_estimate_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'technical_estimate_add']);
            if (!$role->hasPermissionTo('technical_estimate_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('technical_estimate_add');
        if ($request->technical_estimate_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'technical_estimate_edit']);
            if (!$role->hasPermissionTo('technical_estimate_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('technical_estimate_edit');
        if ($request->technical_estimate_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'technical_estimate_delete']);
            if (!$role->hasPermissionTo('technical_estimate_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('technical_estimate_delete');

        if ($request->cost_estimate_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'cost_estimate_index']);
            if (!$role->hasPermissionTo('cost_estimate_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('cost_estimate_index');
        if ($request->cost_estimate_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'cost_estimate_add']);
            if (!$role->hasPermissionTo('cost_estimate_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('cost_estimate_add');

        if ($request->cost_estimate_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'cost_estimate_edit']);
            if (!$role->hasPermissionTo('cost_estimate_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('cost_estimate_edit');

        if ($request->cost_estimate_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'cost_estimate_delete']);
            if (!$role->hasPermissionTo('cost_estimate_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('cost_estimate_delete');

        if ($request->proposal_sharing_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'proposal_sharing_index']);
            if (!$role->hasPermissionTo('proposal_sharing_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('proposal_sharing_index');

        if ($request->proposal_sharing_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'proposal_sharing_add']);
            if (!$role->hasPermissionTo('proposal_sharing_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('proposal_sharing_add');

        if ($request->proposal_sharing_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'proposal_sharing_edit']);
            if (!$role->hasPermissionTo('proposal_sharing_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('proposal_sharing_edit');

        if ($request->proposal_sharing_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'proposal_sharing_delete']);
            if (!$role->hasPermissionTo('proposal_sharing_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('proposal_sharing_delete');


        if ($request->customer_response_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'customer_response_index']);
            if (!$role->hasPermissionTo('customer_response_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('customer_response_index');

        if ($request->customer_response_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'customer_response_add']);
            if (!$role->hasPermissionTo('customer_response_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('customer_response_add');

        if ($request->customer_response_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'customer_response_edit']);
            if (!$role->hasPermissionTo('customer_response_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('customer_response_edit');

        if ($request->customer_response_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'customer_response_delete']);
            if (!$role->hasPermissionTo('customer_response_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('customer_response_delete');


        //employee 
        if ($request->employee_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'employee_index']);
            if (!$role->hasPermissionTo('employee_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('employee_index');

        if ($request->employee_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'employee_add']);
            if (!$role->hasPermissionTo('employee_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('employee_add');

        if ($request->employee_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'employee_edit']);
            if (!$role->hasPermissionTo('employee_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('employee_edit');
        if ($request->employee_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'employee_delete']);
            if (!$role->hasPermissionTo('employee_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('employee_delete');
        //end employee

        //Project 
        if ($request->project_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_index']);
            if (!$role->hasPermissionTo('project_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_index');

        if ($request->project_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_add']);
            if (!$role->hasPermissionTo('project_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_add');

        if ($request->project_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_edit']);
            if (!$role->hasPermissionTo('project_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_edit');
        if ($request->project_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_delete']);
            if (!$role->hasPermissionTo('project_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_delete');
        //end project

        //Task 
        if ($request->task_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'task_index']);
            if (!$role->hasPermissionTo('task_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('task_index');

        if ($request->task_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'task_add']);
            if (!$role->hasPermissionTo('task_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('task_add');

        if ($request->task_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'task_edit']);
            if (!$role->hasPermissionTo('task_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('task_edit');
        if ($request->task_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'task_delete']);
            if (!$role->hasPermissionTo('task_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('task_delete');
        //end task

        //Task 
        if ($request->contract_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'contract_index']);
            if (!$role->hasPermissionTo('contract_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('contract_index');

        if ($request->contract_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'contract_add']);
            if (!$role->hasPermissionTo('contract_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('contract_add');

        if ($request->contract_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'contract_edit']);
            if (!$role->hasPermissionTo('contract_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('contract_edit');
        if ($request->contract_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'contract_delete']);
            if (!$role->hasPermissionTo('contract_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('contract_delete');
        //end contract

        //Economy 
        if ($request->economy_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'economy_index']);
            if (!$role->hasPermissionTo('economy_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('economy_index');

        if ($request->economy_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'economy_add']);
            if (!$role->hasPermissionTo('economy_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('economy_add');

        if ($request->economy_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'economy_edit']);
            if (!$role->hasPermissionTo('economy_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('economy_edit');
        if ($request->economy_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'economy_delete']);
            if (!$role->hasPermissionTo('economy_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('economy_delete');
        //end Economy
        //Supplier Detail 
        if ($request->supplier_detail_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'supplier_detail_index']);
            if (!$role->hasPermissionTo('supplier_detail_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('supplier_detail_index');

        if ($request->supplier_detail_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'supplier_detail_add']);
            if (!$role->hasPermissionTo('supplier_detail_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('supplier_detail_add');

        if ($request->supplier_detail_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'supplier_detail_edit']);
            if (!$role->hasPermissionTo('supplier_detail_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('supplier_detail_edit');
        if ($request->supplier_detail_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'supplier_detail_delete']);
            if (!$role->hasPermissionTo('supplier_detail_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('supplier_detail_delete');
        //end Supplier details

        //Customer Detail 
        if ($request->customer_detail_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'customer_detail_index']);
            if (!$role->hasPermissionTo('customer_detail_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('customer_detail_index');

        if ($request->customer_detail_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'customer_detail_add']);
            if (!$role->hasPermissionTo('customer_detail_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('customer_detail_add');

        if ($request->customer_detail_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'customer_detail_edit']);
            if (!$role->hasPermissionTo('customer_detail_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('customer_detail_edit');
        if ($request->customer_detail_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'customer_detail_delete']);
            if (!$role->hasPermissionTo('customer_detail_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('customer_detail_delete');
        //end customer details

        //Customer Detail 
        if ($request->project_schedule_index == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_schedule_index']);
            if (!$role->hasPermissionTo('project_schedule_index')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_schedule_index');

        if ($request->project_schedule_add == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_schedule_add']);
            if (!$role->hasPermissionTo('project_schedule_add')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_schedule_add');

        if ($request->project_schedule_edit == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_schedule_edit']);
            if (!$role->hasPermissionTo('project_schedule_edit')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_schedule_edit');
        if ($request->project_schedule_delete == true) {
            $permission = Permission::firstOrCreate(['name' => 'project_schedule_delete']);
            if (!$role->hasPermissionTo('project_schedule_delete')) {
                $role->givePermissionTo($permission);
            }
        } else
            $role->revokePermissionTo('project_schedule_delete');
        //end customer details

        return response(['status' => true, 'msg' => __('global.permission_updated')]);
    }

    public function getPermission($id)
    {
        $role = Role::find($id);
        if (!empty($role)) {
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[$permission->name] = true;
            if (empty($all_permission))
                $all_permission[] = 'dummy text';
            return response(['status' => true, 'permission' => (object)$all_permission]);
        }
    }

    public function destroy($id)
    {
        $li_role_data = Role::find($id);
        $li_role_data->is_active = false;
        $li_role_data->save();
        return redirect('role')->with('not_permitted', 'Data deleted successfully');
    }
}
