<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\IfcFilesIcons;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SetupController extends Controller
{
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function role_index(Request $request)
    { 
        if ($request->ajax() == true) {
            $data   = Role::select('*');
            return DataTables::eloquent($data)
            ->addIndexColumn() 
            ->addColumn('status', function($data){
                $status = $data->status == 1 ? 'checked' : "";
                return '
                    <div>
                        <input type="checkbox" id="switch__'.$data->id.'"  '.$status.' data-switch="success"/>
                        <label for="switch__'.$data->id.'" data-on-label="On" onclick="changeStatus('.$data->id.')" data-off-label="Off"></label>
                    </div>
                ';
            })
            ->addColumn('action', function($data){ 
                return '<div class="btn-group">  
                        <button class="shadow btn btn-sm me-2 btn-outline-primary rounded-pill" onclick="editRole(this,'.$data->id.')" name="'.$data->name.'" status="'.$data->status.'"> <i class="fa fa-edit"></i></button> 
                        <button class="shadow btn btn-sm btn-outline-danger rounded-pill" onclick="deleteRole('.$data->id.')"><i class="fa fa-trash"></i></button>
                    </div>';
            })
            ->rawColumns(['action','status'])
            ->make(true);
        }
        return  view('admin.setup.role-permission.role');
    }
    public function permission_index(Request $request,$id)
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
                $check_permission_master = Role::all();
                return view('admin.setup.role-permission.permission', compact('check_permission_master','li_role_data', 'appPermissions', 'all_permission'));
            } else
                return  response(['status' => false, 'msg' => __('global.item_not_found')]);
        } catch (Exception $ex) {
            return  response(['status' => false, 'msg' => __('global.something')]);
        } 
    }
    public function wood_estimation(Request $request)
    {  
        return  view('admin.setup.wood-estimation.index');
    }
    public function wood_estimation_cost_preset (Request $request)
    {  
        return  view('admin.setup.wood-estimation.cost-preset');
    }
    public function precast_estimation(Request $request)
    {  
        return  view('admin.setup.precast-estimation.index');
    }
    public function precast_estimation_cost_preset (Request $request)
    {  
        return  view('admin.setup.precast-estimation.cost-preset');
    }
    public function check_list()
    {
        return  view('admin.setup.check-sheets.check-list');
    }
    public function check_sheet()
    {
        return  view('admin.setup.check-sheets.check-sheet');
    }
    public function ifc_file_icon()
    {
        $files = IfcFilesIcons::latest()->paginate(10);
        return  view('admin.setup.ifc-files.ifc-file-icon', compact('files'));
    }
    public function project_type()
    {
        return  view('admin.setup.project-type.index');
    }
    public function service()
    {
        return  view('admin.setup.service.index');
    }
    public function building_type()
    {
        return  view('admin.setup.building-type.index');
    }
    public function building_component()
    {
        return  view('admin.setup.building-component.index');
    }
    public function construction_type()
    {
        return  view('admin.setup.construction-type.index');
    }
    public function delivery_type()
    {
        return  view('admin.setup.delivery-type.index');
    }
    public function document_type()
    {
        return  view('admin.setup.document-type.index');
    }
    public function files(){
        return view('admin.setup.files.files');
    }
}