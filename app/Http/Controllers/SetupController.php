<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SetupController extends Controller
{
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function role_permission_index(Request $request)
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
                        <button class="shadow btn btn-sm btn-outline-secondary rounded-pill" onclick="deleteRole('.$data->id.')"><i class="fa fa-trash"></i></button>
                    </div>';
            })
            ->rawColumns(['action','status'])
            ->make(true);
        }
        return  view('admin.setup.role-permission.index');
    }
}