<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Employee;
use Illuminate\Http\Response;

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
    public function add_role( Request $request)
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
    public function update_role( Request $request,$id)
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
        $module->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
    }

    public function employee_role()
    {
        # code...
        $data = Role::select('id','role')->get();
        
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

        
        if ($request->hasFile('epm_image')) {
            return "if";
            $image      = $request->file('epm_image');
            // $fileName   = time() . '.' . $image->getClientOriginalExtension();

            // $img = Employee::make($image->getRealPath());
            // $img->resize(120, 120, function ($constraint) {
            //     $constraint->aspectRatio();                 
            // });

            // $img->stream(); // <-- Key point

            // //dd();
            // Employee::disk('local')->put('images/1/smalls'.'/'.$fileName, $img, 'public');
}
// return $request->all();
        $res = $module->save();
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('module.inserted')], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }
    public function getEmployeeId()
    {
        # code...
        $data = Employee::select('id')->withTrashed()->orderBy('created_at', 'desc')->first();
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
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
        $module->delete();
        return response(['status' => true, 'msg' => trans('module.deleted')], Response::HTTP_OK);
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
    public function update_employee($id,Request $request)
    {
        # code...
        // print_r($id);die();
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
        $module->update();
        return response(['status' => true, 'msg' => trans('module.Updated')], Response::HTTP_OK);
        // return redirect()->route('admin-employee-control-view');
        // return redirect()->route('admin-employee-control-view');
        }
        // $res = $module->update($request->only($module->getFillable()));
       
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
