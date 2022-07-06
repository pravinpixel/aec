<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Bim360\Bim360UsersApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Admin\SharePointAccess;
use App\Models\Admin\EmployeeSharePointAcess;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Requests\EmployeeCreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\BuildingComponent;
use App\Models\Type;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\MasterCalculation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    public function employee_control_view()
    {
        if(!userHasAccess('employee_edit')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        session()->forget('id');
        return view('admin.pages.employee.employee-view');
    }
    public function employee_add()
    {
        return view('admin.pages.employee.index');
    }

    public function employeeRole()
    {
        # code...
        $data = Role::select('id','name')->get();
        
    
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function addEmployee(EmployeeCreateRequest $request)
    {
        if(!userHasAccess('employee_add')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        $id = session('id');
 
        $module = new Employee;

        $module->employee_id = $request->epm_id;
        $module->first_Name = $request->epm_fname;
        $module->last_Name = $request->epm_lname;
        $module->user_name = $request->epm_username;
        $module->password = Hash::make($request->epm_password);
        $module->job_role = $request->epm_job_role;
        $module->number = $request->number;
        $module->email = $request->email;
     
        $module->status = 1;
        $module->share_access = 0;
        $module->bim_access = 0;
        $module->access = 0;
        if($request->hasFile('file'))
        {
         
            $image = $request->file('file')->getClientOriginalName();
            // $request->file('file')->move(public_path('image'),$image);

            $request->file('file')->move(public_path('assets/images/'.$request->epm_id),$image);
            $store_image = $request->epm_id.'/'.$image; 
            $module->image = $store_image;
        }
        else{
            $module->image = "no_image.jpg";
        }
        $res = $module->save();
        $role = Role::find($module->job_role);
        if($res &&  ($role->slug == config('global.project_manager')) ){
            $this->createBimUser($module);
        }
        $id = $module->id;
        $data = new EmployeeSharePointAcess();
        $data->employee_id = $id;
        $data->save();
       $valueId = session(['id'=>$id]);
   
        if($res) {
            return response(['status' => true, 'data' => $res ,'msg' => trans('Employee Created'),'data' => $id], Response::HTTP_OK);
        }
        return response(['status' => false ,'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR );
        
    }

    public function updateEmployee($ids,EmployeeUpdateRequest $request)
    {
        if(!userHasAccess('employee_update')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
        $id = session('id');
       
        $module = Employee::find($ids);
        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        if(!empty($module)){
            if($request->epm_password) {
                $module->password =  Hash::make($request->epm_password);
            }
        $module->employee_id = $request->epm_id;
        $module->first_Name = $request->epm_fname;
        $module->last_Name = $request->epm_lname;
        $module->user_name = $request->epm_username;
      
        $module->job_role = $request->epm_job_role;
        $module->number = $request->number;
        $module->email = $request->email;
        if($request->hasFile('file'))
        {
            $image = $request->file('file')->getClientOriginalName();
            // $request->file('file')->move(public_path('image'),$image);
            $request->file('file')->move(public_path('assets/images/'.$request->epm_id),$image);
            $store_image = $request->epm_id.'/'.$image; 
            $module->image = $store_image;
            
            // $module->image = $image;
        }
        $res = $module->update();
        $role = Role::find($module->job_role);
        if($res &&  ($role->slug == config('global.project_manager')) ){
            $this->createBimUser($module);
        }
        return response(['status' => true, 'msg' => trans('module.updated'),'data' => $id], Response::HTTP_OK);
        }
        return response(['status' => false, 'msg' => trans('module.something')], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
    public function getEmployeeId()
    {
        if(session()->has('id'))        
        {
            $data = session('id');
            // return 1;
            // $data = Employee::select('id')->withTrashed()->orderBy('created_at', 'desc')->first();
            if( !empty( $data ) ) {
                return response(['status' => true, 'data' => $data], Response::HTTP_OK);
            }
            if(empty( $data ))
            {
                
                return response(['status' => true, 'data' => 1], Response::HTTP_OK);
            }
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);


        }else{

            $data = Employee::select('id')->orderBy('created_at', 'desc')->first();
            if( !empty( $data ) ) {
                return response(['status' => true, 'data' => $data], Response::HTTP_OK);
            }
            if(empty( $data ))
            {
                
                return response(['status' => true, 'data' => 1], Response::HTTP_OK);
            }
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        
           
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
        if(!userHasAccess('employee_delete')) {
            Flash::error(__('global.access_denied'));
            return redirect(route('admin-dashboard'));
        }
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
        $valueId = session(['id'=>$id]);
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
        // return "with out id";
        $id = session('id');
        $data1['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first();
        if(!empty($data1['employeeFolderStatus']))
        {
    
            $employeData =Employee::where('id',$id)->first();
            $data1['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
            $data = SharePointAccess::where('is_active','=','1')->get();
            foreach( $data1['employeeFolderStatus'] as $key=>$val)
            {
         
                foreach($data as $shareKey=>$sharVal)
                {
                    
                    if($key == $sharVal['data_name'])
                    {
                        $sharVal['is_active'] = $val;
                    }
                }
            }
            
            if( !empty( $data ) ) {
                return response(['status' => true,'active'=>false, 'data' => $data,'employeeData'=>$employeData], Response::HTTP_OK);
            } 
            
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);

        }
        else
        {
 
            $data = SharePointAccess::where('is_active','=','1')->select('folder_name','id','data_name')->get();
            if( !empty( $data ) ) {
                return response(['status' => true, 'data' => $data], Response::HTTP_OK);
            } 
            
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
      
    }
    public function sharePointAcessId($id)
    {
       
        $employeData =Employee::where('id',$id)->first();
        $data1['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first();
        if(!empty($data1['employeeFolderStatus'])){
            $data1['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
            $data = SharePointAccess::where('is_active','=','1')->get();
            foreach( $data1['employeeFolderStatus'] as $key=>$val)
            {
    
                foreach($data as $shareKey=>$sharVal)
                {
 
                    if($key == $sharVal['data_name'])
                    {
                        $sharVal['is_active'] = $val;
                    }
                }
            }
            
            if( !empty( $data ) ) {
                return response(['status' => true,'active'=>false, 'data' => $data,'employeeData'=>$employeData], Response::HTTP_OK);
            } 
            
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        else{
            $employeData =Employee::where('id',$id)->first();
            $data = SharePointAccess::where('is_active','=','1')->get();
            if( !empty( $data ) ) {
                return response(['status' => true,'active'=>true, 'data' => $data,'employeeData'=>$employeData], Response::HTTP_OK);
            } 
            
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
      
    }
    public function editSharePointAcess()
    {
        $id = session('id');

        $data['employeeDetail']=Employee::where('id',$id)->first();
        $data['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
        $data['sharePointAccess'] = SharePointAccess::where('is_active','=','1')->get();
        foreach( $data['employeeFolderStatus'] as $key=>$val)
        {

            foreach($data['sharePointAccess'] as $shareKey=>$sharVal)
            {
    
                if($key == $sharVal['data_name'])
                {
                    $sharVal['is_active'] = $val;
                }
            }
        }

        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        
        return response(['status' => false, 'msg' => trans('module.item_not_found'),'data'=>$data], Response::HTTP_NOT_FOUND);
    }
    public function sharePointStatus(Request $request)
    {
        $id = session('id');
        if($id)
        {

                $oldData  = EmployeeSharePointAcess::where('employee_id',$id)->first();
               
                if($oldData)
                {

                    if($request->share_point_status)
                    {
                        $oldData->employee_id = $id;
                        $oldData->{$request->fieldName} = $request->dataId;
                        $id = $oldData->update();
                        return response(['status' => true, 'data' => $id], Response::HTTP_OK);
                    }
                  
                }
                
            
          
        }
      

    }
    public function profileInfo()
    {

   session()->forget('id');
       return view('admin.pages.employee.create.employee-add');
    }
    public function getEmployeeDetail($id)
    {
        // return 1;

        $data['employeeDetail']=Employee::where('id',$id)->first();
        $data['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
        $data['sharePointAccess'] = SharePointAccess::where('is_active','=','1')->get();
        foreach( $data['employeeFolderStatus'] as $key=>$val)
        {
            foreach($data['sharePointAccess'] as $shareKey=>$sharVal)
            {
                if($key == $sharVal['data_name'])
                {
                    $sharVal['is_active'] = $val;
                }
            }
        }
     
        return  $data;


    }
    public function employeeSharePointAccessStatus(Request $request)
    {
        $id = session('id');
        $data = Employee::where('id',$id)->first();

        if($data)
        {
        //    return $request->dataId;
            $data->share_access = $request->dataId;
            $data->save();
            $val = EmployeeSharePointAcess::where('employee_id',$id)->first();
            if(empty($val))
            {
                $data = new EmployeeSharePointAcess();
                $data->employee_id = $id;
                $id = $data->save();
                $data['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
                $data['sharePointAccess'] = SharePointAccess::where('is_active','=','1')->get();
                foreach( $data['employeeFolderStatus'] as $key=>$val)
                {
                    foreach($data['sharePointAccess'] as $shareKey=>$sharVal)
                    {
                        if($key == $sharVal['data_name'])
                        {
                            $sharVal['is_active'] = $val;
                        }
                    }
                }
                return response(['status' => true, 'data' => $data], Response::HTTP_OK);
            }
            if($request->dataId == true){
                $data['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
                $data['sharePointAccess'] = SharePointAccess::where('is_active','=','1')->get();
                foreach( $data['employeeFolderStatus'] as $key=>$val)
                {
                    foreach($data['sharePointAccess'] as $shareKey=>$sharVal)
                    {
                        if($key == $sharVal['data_name'])
                        {
                            $sharVal['is_active'] = $val;
                        }
                    }
                }
                if( !empty( $data ) ) {
                    return response(['status' => true, 'data' => $data], Response::HTTP_OK);
                } 

            }
            if($request->dataId == false)
            {
     
                $val = EmployeeSharePointAcess::where('employee_id',$id)->first();
                $val->administration_status = 0;
                $val->business_status = 0;
                $val->sales_status = 0; 
                $val->projects_status = 0;
                $val->engineering_status = 0;
                $val->subsea_projects_status = 0;
                $val->save();
                

                $data['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first()->toArray();
                $data['sharePointAccess'] = SharePointAccess::where('is_active','=','1')->get();
                foreach( $data['employeeFolderStatus'] as $key=>$val)
                {
          
                    foreach($data['sharePointAccess'] as $shareKey=>$sharVal)
                    {
                
                        if($key == $sharVal['data_name'])
                        {
                            $sharVal['is_active'] = $val;
                        }
                    }
                }
                if( !empty( $data ) ) {
                    return response(['status' => true, 'data' => $data], Response::HTTP_OK);
                } 

            }
           
           
        }
        // return $data;
    }
    public function employeeBIMStatus(Request $request)
    {
        
        $data = Employee::where('id',$request->employeeId)->first();

        if($data)
        {
            $data->bim_access = $request->dataId;
            $data->save();
        }
        return $data;
    }
    public function employeeMail($id)
    {

        try {
       $data = Employee::where('id',$id)->first();
        
       $details = [
        'user_name'     => $data->user_name,
        'email'    => $data->email,
        ]; 
       $res = Mail::to($data->email)->send(new \App\Mail\EmployeeMail($details));
        //    return $res;
        return response(['status' => true, 'data' => $res ,'msg' => trans('Mail Sent Successfully')], Response::HTTP_CREATED);
        }catch(\Exception $e){
            Log::info($e->getMessage());
            DB::rollBack();
            return response(['status' => false, 'data' => '' ,'msg' => trans('global.something')], Response::HTTP_OK);
        }
    }
    public function getEmployeeData()
    {
   
        $id = session('id');
        $data = Employee::where('id',$id)->first();
        if( !empty( $data ) ) {
            return response(['status' => true,'active'=>"active", 'data' => $data,'deleteImageBtn'=>false], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function deleteEmployeeImage(Type $var = null)
    {
        $id = session('id');
        $data = Employee::where('id',$id)->first();
        $data->image="no_image.jpg";
        $data->save();
        return 1;

    }
    public function sharePointAccessStatus($id)
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
    

    public function getTechnicalEstimateEmployee(Request $request)
    {
        $role = Role::where('slug', config('global.technical_estimater'))->first();
        return Employee::where(['job_role' => $role->id,'status'=> 1])->orWhere('job_role', 1)->get();
    }

    public function getCostEstimateEmployee(Request $request)
    {
        $role = Role::where('slug', config('global.cost_estimater'))->first();
        return Employee::where(['job_role' => $role->id,'status'=> 1])
                        ->where('id','!=', Admin()->id)
                        ->get();
    }

    public function getDeliveryManager(Request $request)
    {
        return Employee::with('role')->where('status', 1)->get()
                        ->map(function ($employee){
                            return [
                                'user_name' => "{$employee->user_name} - ({$employee->role->name})", 
                                'id' => $employee->id
                            ];
                        });
    }
    

    public function createBimUser($employee)
    {
        Log::info('Bim user creation start');
        $input        = [];
        $api          = new  Bim360UsersApi();
        $input["company_id"] = env('BIMDEFAULTCOMPANY');
        $input["email"]      = $employee->email;
        $input['bim_id']     = $employee->bim_id ?? Null;
        $input["nickname"]   = $employee->first_Name;
        $input["first_name"] = $employee->first_Name;
        $input["last_name"]  = $employee->last_name;
        if (isset($input["bim_id"]) && !empty($input["bim_id"])) {
            $editJson = json_encode($input);
            $result = $api->editUser($input['bim_id'], $editJson);
        } else {
            $createJson = json_encode($input);
            $result = $api->createUser($createJson);
        }
        Log::info("result {$result}");
        $response = json_decode($result);
        $employee->bim_id =  $response->id;
        $employee->bim_account_id =  $response->account_id;
        $updateUser = json_encode(['status'=> 'active', 'company_id'=> env('BIMDEFAULTCOMPANY')]);
        $result = $api->editUser($employee->bim_id,  $updateUser);
        Log::info("result {$result}");
        Log::info('Bim user creation end');
        return $employee->save();
    }

}
