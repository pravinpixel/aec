<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Employee;
use App\Models\BuildingComponent;
use App\Models\Type;
use App\Http\Requests\RoleCreateRequest;
use App\Models\MasterCalculation;

use Illuminate\Http\Response;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class EmployeeController extends Controller
{
    public function employee_control_view()
    {
        return view('admin.pages.employee-view');
    }
    public function employee_add()
    {
        return view('admin.pages.employee-add');
    }
    public function add_role(RoleCreateRequest $request)
    {
        // return $request->all();
        $module = new Role;
        $insert = $request->only($module->getFillable());
        // $insert['order_id'] =  Module::get()->count() + 1;
        $res = Role::create($insert);
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('module.inserted')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }
    public function update_role( RoleCreateRequest $request,$id)
    {
        // return $id;
        
        $module = Role::find($id);
        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $res = $module->update($request->only($module->getFillable()));
        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.updated'), 'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    
    public function get_role()
    {
        // return 1;
        $data = Role::all();
        
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function status($id)
    {
        $module = Role::find($id);

        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $module->status = !$module->status;
        $res = $module->save();

        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function edit_role($id)
    {
        $data = Role::find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function delete_role($id)
    {
        
         $module = Role::find($id);
        if (empty($module)) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        $module->status = 2;
        $module->save();
        $module->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }

    public function employee_role()
    {
        # code...
        $data = Role::select('id','role')->where('status','=','1')->get();
        
        // return $data;
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function add_employee(Request $request)
    {
        # code...
        // return $request->all();
       
         
        // return response(['status' => true, 'data' => $request->all() ,'msg' => trans('Employee Created')], Response::HTTP_OK);
        $module = new Employee;

        $module->employee_id = $request->epm_id;
        $module->first_Name = $request->epm_fname;
        $module->last_Name = $request->epm_lname;
        $module->user_name = $request->epm_username;
        $module->password = $request->epm_password;
        $module->job_role = $request->epm_job_role;
        $module->number = $request->epm_number;
        $module->email = $request->epm_email;
        // $module->image = '';
        $module->status = 1;
        $module->share_access = 1;
        $module->bim_access = 0;
        $module->access = 1;
        if($request->hasFile('file'))
        {
            // return "sss";
            $image = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('image'),$image);
            // return $image;
            $module->image = $image;
        }
        $res = $module->save();
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('Employee Created')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }

    public function update_employee($id,Request $request)
    {
        // return $request->all();
        $module = Employee::find($id);
        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        if(!empty($module)){
        
        $module->employee_id = $request->epm_id;
        $module->first_Name = $request->epm_fname;
        $module->last_Name = $request->epm_lname;
        $module->user_name = $request->epm_username;
        $module->password = $request->epm_password;
        $module->job_role = $request->epm_job_role;
        $module->number = $request->epm_number;
        $module->email = $request->epm_email;
        if($request->hasFile('file'))
        {
            // return "sss";
            $image = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('image'),$image);
            // return $image;
            $module->image = $image;
        }


        $module->update();
        return response(['status' => true, 'msg' => trans('module.Updated')], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function getEmployeeId()
    {
        $data = Employee::select('id')->withTrashed()->orderBy('created_at', 'desc')->first();
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        }
        if(empty( $data ))
        {
            
            return response(['status' => true, 'data' => 1], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function get_employee()
    {
        # code..
       
        $data= Employee::get();
        // return $data;
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);

    }
    public function employee_delete($id)
    {
        # code...
    
        $module = Employee::find($id);
        if (empty($module)) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        $module->status = 2;
        $module->save();
        $module->delete();
        return response(['status' => true, 'msg' => trans('Employee deleted')], Response::HTTP_OK);
    }
    public function employeeEdit($id)
    {

        $id = $id;
        return view('admin.pages.employee-edit',compact('id'));
       
    }
    public function get_EditEmployee($id)
    {
        // return $id;
        $data = Employee::find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
   
    public function employee_status($id)
    {
        $module = Employee::find($id);

        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
        $module->status = !$module->status;
        $res = $module->save();

        if( $res ) {
            return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function employee_enquiry($id)
    {
        # code...
        // return $id;
        $module = Employee::where('id',$id)->first();

        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        } 
    
        if( $module ) {
            return response(['status' => true, 'msg' => trans('module.status_updated'),  'data' => $module], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function employee()
    {
        // dd("s");
        return view('admin.pages.employee');
    }
    public function dummyEmployee(Request $request)
    {
         dd ($request->file('file'));
        //  return $val;
    }
   
    
}
