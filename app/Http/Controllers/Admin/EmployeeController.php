<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Bim360\Bim360UsersApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\Models\Admin\Employees;
use App\Models\AecUsers;
use App\Models\MasterCalculation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() == true) {
            $data   = Employees::where('id', '!=', 2)->select('*');
            return DataTables::eloquent($data)
                ->addIndexColumn() 
                ->addColumn('reference_number', function($data){ 
                    return '<span class="badge badge-primary-lighten">'. $data->reference_number.'</span>' ;
                })
                ->addColumn('role', function($data){ 
                    return $data->role->name ;
                })
                ->addColumn('status', function($data){ 
                    $status =  $data->status == 1 ? 'text-success' : 'text-danger';
                    $status_icon =  $data->status == 1 ? 'check' : 'times';
                    return '<span class="'.$status.' mx-auto"><i class="fa font-22 fa-'.$status_icon.'-circle"></i></span>';
                })
                ->addColumn('share_point_status', function($data){ 
                    $status =  $data->share_point_status == 1 ? 'text-success' : 'text-danger';
                    $status_icon =  $data->share_point_status == 1 ? 'check' : 'times';
                    return '<span class="'.$status.' mx-auto"><i class="fa font-22 fa-'.$status_icon.'-circle"></i></span>';
                })
                ->addColumn('bim_id', function($data){ 
                    $status =  $data->bim_id == 1 ? 'text-success' : 'text-danger';
                    $status_icon =  $data->bim_id == 1 ? 'check' : 'times';
                    return '<span class="'.$status.' mx-auto"><i class="fa font-22 fa-'.$status_icon.'-circle"></i></span>';
                })
                ->addColumn('action', function($data){ 
                    if(userRole()->slug == 'admin') {
                        if($data->status) {
                            $action = '<a class="dropdown-item" onclick="UpdateUserStatus(event,'.$data->id.', '.$data->status.')"><i class="fas fa-user-alt-slash"></i> Inactive </a>';
                        } else {
                            $action = '<a class="dropdown-item" onclick="UpdateUserStatus(event,'.$data->id.','.$data->status.')"><i class="fas fa-user-alt"></i> Active </a>';
                        }
                    } else {
                        $action = '<a class="dropdown-item" href="'.route('employee.change-password', $data->id).'"><i class="fa fa-edit me-1"></i>Change Password </a>';
                    }
                    return ' 
                       <div class="dropdown text-center"> 
                            <i class="dripicons-dots-3 border btn py-0 px-1 btn-light" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="'.route('edit.employee', $data->id).'"><i class="fa fa-edit me-1"></i> View / Edit</a>
                                '.$action.'
                                <button class="dropdown-item" onclick="destroy('.$data->id.')"><i class="fa fa-trash me-1"></i> Delete</button>
                            </div>
                        </div>
                    ';
                }) 
                ->rawColumns(['action','status','role','share_point_status','bim_id','reference_number'])
            ->make(true);
        }
        return view('livewire.employee.index');
    }
    public function deleted_employees_index()
    {
        $data   = Employees::onlyTrashed()->get();
 
        return DataTables::of($data)
            ->addIndexColumn() 
            ->addColumn('reference_number', function($data){ 
                return '<span class="badge badge-primary-lighten">'. $data->reference_number.'</span>' ;
            })
            ->addColumn('role', function($data){ 
                return $data->role->name ;
            })
            ->addColumn('status', function($data){ 
                $status =  $data->status == 1 ? 'text-success' : 'text-danger';
                $status_icon =  $data->status == 1 ? 'check' : 'times';
                return '<span class="'.$status.' mx-auto"><i class="fa font-22 fa-'.$status_icon.'-circle"></i></span>';
            })
            ->addColumn('share_point_status', function($data){ 
                $status =  $data->share_point_status == 1 ? 'text-success' : 'text-danger';
                $status_icon =  $data->share_point_status == 1 ? 'check' : 'times';
                return '<span class="'.$status.' mx-auto"><i class="fa font-22 fa-'.$status_icon.'-circle"></i></span>';
            })
            ->addColumn('bim_id', function($data){ 
                $status =  $data->bim_id == 1 ? 'text-success' : 'text-danger';
                $status_icon =  $data->bim_id == 1 ? 'check' : 'times';
                return '<span class="'.$status.' mx-auto"><i class="fa font-22 fa-'.$status_icon.'-circle"></i></span>';
            })
            ->addColumn('action', function($data){ 
                return ' 
                    <div class="dropdown text-center"> 
                        <i class="dripicons-dots-3 border btn py-0 px-1 btn-light" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item" onclick="restore('.$data->id.')"><i class="fa fa-minus-circle me-1"></i>Restore</button>
                            <button class="dropdown-item text-danger" onclick="powerDestroy('.$data->id.')"><i class="fa fa-trash me-1"></i>Delete</button>
                        </div>
                    </div>
                ';
            }) 
            ->rawColumns(['action','status','role','share_point_status','bim_id','reference_number'])
        ->make(true);
    }
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
        
        $AecUsers = AecUsers::create([
            'first_name' => $request->epm_fname,
            'last_name'  => $request->epm_lname,
            'full_name'  => $request->epm_username,
            'email'      => $request->email,
            'password'   => Hash::make($request->epm_password),
            'image'      => "https://picsum.photos/200",
            'job_role'   => $request->epm_job_role
        ]);
        
        $module = new Employees();
        $module->aec_user_id = $AecUsers->id;
        $module->employee_id = $request->epm_id;
        $module->first_name = $request->epm_fname;
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
       
        $module = Employees::find($ids);
        if( empty( $module ) ) {
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
        }
        if(!empty($module)){
            if($request->epm_password) {
                $module->password =  Hash::make($request->epm_password);
            }
        $module->employee_id = $request->epm_id;
        $module->first_name = $request->epm_fname;
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
            // $data = Employees::select('id')->withTrashed()->orderBy('created_at', 'desc')->first();
            if( !empty( $data ) ) {
                return response(['status' => true, 'data' => $data], Response::HTTP_OK);
            }
            if(empty( $data ))
            {
                
                return response(['status' => true, 'data' => 1], Response::HTTP_OK);
            }
            return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);


        }else{

            $data = Employees::select('id')->orderBy('created_at', 'desc')->first();
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
       
        $data= Employees::get();
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
        $module = Employees::find($id);
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
        $data = Employees::find($id);
        if( !empty( $data ) ) {
            return response(['status' => true, 'data' => $data], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
   
    public function employeeStatus($id)
    {
        $module = Employees::find($id);

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
        $module = Employees::where('id',$id)->first();

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
    public function sharePointAcess()
    {
        // return "with out id";
        $id = session('id');
        $data1['employeeFolderStatus']=EmployeeSharePointAcess::where('employee_id',$id)->first();
        if(!empty($data1['employeeFolderStatus']))
        {
    
            $employeData =Employees::where('id',$id)->first();
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
       
        $employeData =Employees::where('id',$id)->first();
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
            $employeData =Employees::where('id',$id)->first();
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

        $data['employeeDetail']=Employees::where('id',$id)->first();
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

        $data['employeeDetail']=Employees::where('id',$id)->first();
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
        $data = Employees::where('id',$id)->first();

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
        
        $data = Employees::where('id',$request->employeeId)->first();

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
       $data = Employees::where('id',$id)->first();
        
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
        $data = Employees::where('id',$id)->first();
        if( !empty( $data ) ) {
            return response(['status' => true,'active'=>"active", 'data' => $data,'deleteImageBtn'=>false], Response::HTTP_OK);
        } 
        return response(['status' => false, 'msg' => trans('module.item_not_found')], Response::HTTP_NOT_FOUND);
    }
    public function deleteEmployeeImage(Type $var = null)
    {
        $id = session('id');
        $data = Employees::where('id',$id)->first();
        $data->image="no_image.jpg";
        $data->save();
        return 1;

    }
    public function sharePointAccessStatus($id)
    {
        $module = Employees::find($id);

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
        $saleEngineer = Role::where('slug', config('global.technical_estimater'))->first();
        return Employees::where('status', 1)
                        ->whereIn('job_role',[$saleEngineer->id])
                        ->where('id','!=', Admin()->id)
                        ->get();
    }

    public function getCostEstimateEmployee(Request $request)
    {
        $role = Role::where('slug', config('global.cost_estimater'))->first();
        return Employees::where(['job_role' => $role->id,'status'=> 1])
                        ->where('id','!=', Admin()->id)
                        ->get();
    }

    public function getDeliveryManager(Request $request)
    { 
        return Employees::with(['role'])->WhereHas('role', function ($query) {
            $query->where('slug', 'admin')->OrWhere('slug', 'project_manager');
        })->get(); 
    }

    public function createBimUser($employee)
    {
        Log::info('Bim user creation start');
        $input        = [];
        $api          = new  Bim360UsersApi();
        $input["company_id"] = env('BIMDEFAULTCOMPANY');
        $input["email"]      = $employee->email;
        $input['bim_id']     = $employee->bim_id ?? Null;
        $input["nickname"]   = $employee->first_name;
        $input["first_name"] = $employee->first_name;
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
        $updateUser = json_encode(['status'=> 'active', 'role' =>'project_admin', 'company_id'=> env('BIMDEFAULTCOMPANY')]);
        $result = $api->editUser($employee->bim_id,  $updateUser);
        Log::info("result {$result}");
        Log::info('Bim user creation end');
        return $employee->save();
    }

    public function updateStatus($id)
    {
        $employee = Employees::find($id);
        if($employee->id != Admin()->id && userRole()->name != 'admin') {
            $employee->status = !$employee->status;
            $employee->save();
            return response(['status'=> true, 'msg'=>__('global.updated')]);
        }
        return response(['status'=> false, 'msg'=>__('global.something')]);
    }
    public function destroy($id)
    {
        try {
            Employees::findOrFail($id)->delete();
            return response()->json(['status'=> true, 'msg'=>__('global.deleted')]);
        } catch (\Throwable $th) {
            return response()->json(['status'=> false, 'msg'=>__('global.something')]);
        } 
    }
    public function hard_destroy($id)
    {
        try {
            Employees::withTrashed()->find($id)->forceDelete();
            return response()->json(['status'=> true, 'msg'=>__('global.deleted')]);
        } catch (\Throwable $th) {
            return response()->json(['status'=> false, 'msg'=>__('global.something')]);
        } 
    }
    public function restore($id)
    {
        try {
            Employees::withTrashed()->find($id)->restore();
            return response()->json(['status'=> true, 'msg'=>"Restore Success !"]);
        } catch (\Throwable $th) {
            return response()->json(['status'=> false, 'msg'=>__('global.something')]);
        } 
    }
}