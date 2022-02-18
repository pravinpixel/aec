<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Employee;
use App\Models\Admin\SharePointAccess;
use App\Models\Admin\EmployeeSharePointAcess;

use App\Models\BuildingComponent;
use App\Models\Type;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;

use App\Models\MasterCalculation;

use Illuminate\Http\Response;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Illuminate\Support\Facades\Session;
class EmployeeController extends Controller
{
    public function employee_control_view()
    {
        return view('admin.pages.employee.employee-view');
    }
    public function employee_add()
    {
        return view('admin.pages.employee.index');
    }

    public function employeeRole()
    {
        # code...
        $data = Role::select('id','role_name')->where('status','=','1')->get();
        
        // return $data;
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function addEmployee(Request $request)
    {
        // return 1;         
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
        // $module->share_access = 1;
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
        $id = $module->id;
       $valueId = session(['id'=>$id]);
        // return $id;
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('Employee Created'),'data' => $id], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
    }

    public function updateEmployee($id,Request $request)
    {
        // return 1;  
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
            $image = $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('image'),$image);
            $module->image = $image;
        }


        $module->update();
        return response(['status' => true, 'msg' => trans('module.updated'),'data' => $id], Response::HTTP_OK);
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
    public function getEmployee()
    {
        # code..
       
        $data= Employee::get();
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);

    }
    public function employeeDelete($id)
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
        return view('admin.pages.employee.employee-edit',compact('id'));
       
    }
    public function getEditEmployee($id)
    {
        $data = Employee::find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
   
    public function employeeStatus($id)
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
        return view('admin.pages.employee');
    }
    public function sharePointAcess(Type $var = null)
    {
        
        $data = SharePointAccess::where('is_active','=','1')->get();
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function editSharePointAcess($id)
    {
        // return $id;



        $data['employeeDetail']=Employee::where('id',$id)->first();
        $data['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
        $data['sharePointAccess'] = SharePointAccess::where('is_active','=','1')->get();
        foreach( $data['employeeFolderStatus'] as $key=>$val)
        {
        //     print_r($key."=");
            foreach($data['sharePointAccess'] as $shareKey=>$sharVal)
            {
                // print_r($sharVal['data_name']);
                if($key == $sharVal['data_name'])
                {
                    $sharVal['is_active'] = $val;
                }
            }
        }


        // $data = SharePointAccess::where('is_active','=','1')->get();
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        
        return response(['status' => false, 'msg' => trans('module.item_not_found'),'data'=>$data], Response::HTTP_NOT_FOUND);
    }
    public function sharePointStatus(Request $request)
    {
 
        if($request->employeeId)
        {

                $oldData  = EmployeeSharePointAcess::where('employee_id',$request->employeeId)->first();
                // return $oldData;
                if($oldData)
                {
                    $oldData->employee_id = $request->employeeId;
                    $oldData->{$request->fieldName} = $request->dataId;
                    $oldData->update();
                }
                else{
                    $data = new EmployeeSharePointAcess();
                    $data->employee_id = $request->employeeId;
                    $data->{$request->fieldName} = $request->dataId;
                    $data->save();
                }
            
          
        }
      

    }
    // public function profileInfo()
    // {
   
    //    return view('admin.pages.employee.employee-add');
    // }
    public function getEmployeeDetail($id)
    {
        // return $id;
        $data['employeeDetail']=Employee::where('id',$id)->first();
        $data['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
        $data['sharePointAccess'] = SharePointAccess::where('is_active','=','1')->get();
        foreach( $data['employeeFolderStatus'] as $key=>$val)
        {
        //     print_r($key."=");
            foreach($data['sharePointAccess'] as $shareKey=>$sharVal)
            {
                // print_r($sharVal['data_name']);
                if($key == $sharVal['data_name'])
                {
                    $sharVal['is_active'] = $val;
                }
            }
        }
        // die();
        return $data;


    }
    public function employeeSharePointAccessStatus(Request $request )
    {
        
        $data = Employee::where('id',$request->employeeId)->first();

        if($data)
        {
        //    return $request->dataId;
            $data->share_access = $request->dataId;
            $data->save();
        }
        return $data;
    }
    public function employeeBIMStatus(Request $request)
    {
        
        $data = Employee::where('id',$request->employeeId)->first();

        if($data)
        {
            // return $data->bim_access;
            $data->bim_access = $request->dataId;
            $data->save();
        }
        return $data;
    }
    
    
   
    
}
