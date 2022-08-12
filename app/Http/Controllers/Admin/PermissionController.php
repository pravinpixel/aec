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
                    $all_permission[] = [];
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
        $role = Role::find($id);
        $role->permissions()->detach();
        foreach($request->all() as $key => $permission) {
            if ($request->{$key}) {
                $permission = Permission::firstOrCreate(['name' => $key]);
                if (!$role->hasPermissionTo($key)) {
                    $role->givePermissionTo($permission);
                }
            }
        }
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
                $all_permission[] = [];
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
