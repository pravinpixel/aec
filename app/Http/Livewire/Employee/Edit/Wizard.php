<?php

namespace App\Http\Livewire\Employee\Edit;

use App\Helper\Bim360\Bim360Company;
use App\Helper\Bim360\Bim360Project;
use App\Helper\Bim360\Bim360ProjectsApi;
use App\Helper\Bim360\Bim360UsersApi;
use App\Models\Admin\Employees;
use App\Models\Admin\SharePointAccess;
use App\Models\Employee;
use App\Models\EmployeeBimAccessProject;
use App\Models\Project;
use App\Models\Role;
use App\Services\GlobalService;
use Autodesk\Forge\Client\Model\Projects;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Wizard extends Component
{
    use WithFileUploads;

    public $employee_id,$country_code = 47, $display_name, $first_name, $last_name, $job_title, $email, $image, $number;
    public $currentStep = 1, $share_point_status = 0, $successMessage = '', $sharePointAccess = [];
    public $employees, $roles = [],  $id, $is_uploaded, $uploaded_image, $completed_wizard = 0; 
    public $share_folder_name  = null;
    public function __construct()
    {
        $this->id = Route::current()->parameter('id');
    }

    public function mount() {
        $employee                 = Employees::findOrFail($this->id);
        $this->reference_number   = $employee->reference_number;
        $this->display_name       = $employee->display_name;
        $this->first_name         = $employee->first_name;
        $this->last_name          = $employee->last_name;
        $this->job_title          = $employee->job_title;
        $this->job_role           = $employee->job_role;
        $this->email              = $employee->email;
        $this->image              = $employee->image;
        $this->uploaded_image     = $employee->image;
        $this->mobile_number      = $employee->mobile_number;
        $this->country_code       = $employee->country_code;
        $this->share_point_status = $employee->share_point_status;
        $this->is_uploaded        = true;
        $this->roles              = Role::all();
        $this->sharePointAccess   = SharePointAccess::all();
    }
    
    public function updatedImage($newValue)
    {
        $employee        = Employees::findOrFail($this->id);
        $profile = public_path('uploads/'.$employee->image);
        if(file_exists($profile)) {
            @unlink($profile);
        }
        $uploadPath      = GlobalService::getEmployeePath();
        $path            = $this->image->storePublicly($uploadPath, 'enquiry_uploads');
        $employee->image = $path;
        $employee->save();
        $this->is_uploaded = false;
    }

    public function updatedSharePointStatus($value) {
        $employee        = Employees::findOrFail($this->id);
        $employee->share_point_status = !$employee->share_point_status;
        $employee->save();
    }

    public function updatePersonalInformation()    {
        $employee = Employees::findOrFail($this->id);
        // $uploadPath         =   GlobalService::getEmployeePath();
        // $path               =   $this->image->storePublicly($uploadPath, 'enquiry_uploads');

        if ($this->country_code == '47') {
            $pattern = "regex:/^\d{8}$|^\d{12}$/" ;
            $customMessages = [
                'regex' => 'Mobile no between 8 to 12 digits',
            ];
        } elseif($this->country_code == '91') {
            $pattern = "regex:/^\d{10}$/";
            $customMessages = [
                'regex' => 'Mobile no must have a 10 digits',
            ];
        }
                
        $this->validate([
            'email'         => ['required','email', Rule::unique('employees')->ignore($employee->id)],
            'job_role'      => ['required'],
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'display_name'  => ['required', Rule::unique('employees')->ignore($employee->id)],
            'mobile_number' => ['required',$pattern,Rule::unique('employees')->ignore($employee->id)],
        ], $customMessages); 

        $employee->first_name    = $this->first_name;
        $employee->last_name     = $this->last_name;
        $employee->display_name  = $this->display_name;
        $employee->email         = $this->email;
        $employee->job_title     = $this->job_title;
        $employee->job_role      = $this->job_role;
        $employee->mobile_number = $this->mobile_number;
        $employee->country_code  = $this->country_code;
        
        if($employee->completed_wizard >= 1) {
            $employee->completed_wizard        = $this->completed_wizard;
        }
        $this->completed_wizard = 1;
        $this->is_upload                   = false;
        $employee->save();
        $this->updateBimUser($employee);
        $this->next();
    }

    public function updateSharePointAccess()    {
        $employee        = Employees::findOrFail($this->id);
        if($employee->completed_wizard >= 2) {
            $employee->completed_wizard = 2;
            $employee->save();
        }
        $this->currentStep = 3;
        $this->completed_wizard = 2;
        $this->projects = $this->getProjectList();
    }

    public function getProjectList()
    {
        return DB::select("select
                `aec_projects` .*,
                `aec_roles`.`name` as `role_name`,
                `aec_project_types`.`project_type_name` as `project_type_name`,
                `aec_employee_bim_access_projects`.`access_status` as `access_status`,
                `aec_employee_bim_access_projects`.`document_management` as `document_management`,
                `aec_employee_bim_access_projects`.`insight` as `insight`,
                `aec_employee_bim_access_projects`.`design_collaboration` as `design_collaboration`,
                `aec_employee_bim_access_projects`.`is_project_admin` as `is_project_admin`
            from
                `aec_projects`
            left join `aec_project_types` on
                `aec_projects`.`project_type_id` = `aec_project_types`.`id`
            left join `aec_employee_bim_access_projects` on
                (`aec_projects`.`id` = `aec_employee_bim_access_projects`.`project_id`
                    and `aec_employee_bim_access_projects`.`employee_id` = {$this->id})
            left join `aec_employees` on
                `aec_employees`.`id` = `aec_employee_bim_access_projects`.`employee_id`
            left join `aec_roles` on 
                `aec_roles`.`id` = `aec_employees`.`job_role`
            where
                `aec_projects`.`bim_id` is not null");
    }

    public function updateAccessStatus($projectId)
    {
        $employee = Employees::with('role')->find($this->id);
        $employeeId = $employee->id;
        $project = Project::find($projectId);
        $employeeBimProjects = EmployeeBimAccessProject::where(['employee_id' => $employeeId, 'project_id' => $projectId])->first();
        if(!$employeeBimProjects) {
            $employeeBimProjects = new EmployeeBimAccessProject();
            $employeeBimProjects->employee_id = $employeeId;
            $employeeBimProjects->project_id = $projectId;
            $employeeBimProjects->access_status = 1;
        } else {
            $employeeBimProjects->access_status = !$employeeBimProjects->access_status;
        }
        $employeeBimProjects->role = $employee->role->name;
        $employeeBimProjects->save();
        if($employeeBimProjects->access_status) {
           
        }
        $this->projects = $this->getProjectList();
    }

    public function updateServices($service, $projectId)
    {
        $employee = Employees::with('role')->find($this->id);
        $employeeBimProjects = EmployeeBimAccessProject::where(['employee_id' => $employee->id, 'project_id' => $projectId])->first();
        if(!$employeeBimProjects) {
            $employeeBimProjects = new EmployeeBimAccessProject();
            $employeeBimProjects->employee_id = $employee->id;
            $employeeBimProjects->project_id = $projectId;
            $employeeBimProjects->{$service} = 1;
            $userExists = false;
        } else {
            $employeeBimProjectClone = clone $employeeBimProjects;
            $employeeBimProjects->{$service} = !$employeeBimProjectClone->{$service};
            $userExists = $this->checkUserExists($employeeBimProjectClone);
        }
        $employeeBimProjects->save();
        if($employeeBimProjects->access_status) {
            $services = $this->getActiveServices($employeeBimProjects);
            $this->updateBimService($services, $projectId,  $userExists);
        }
        $this->projects = $this->getProjectList();
    }

    public function getActiveServices($projectServices) {
        $service = [];
        if($projectServices->document_management) {
            $service['document_management'] = ['access_level' => $projectServices->is_project_admin ? 'admin' : 'user'];
        }
        if($projectServices->is_project_admin) {
            $service['project_administration'] = ['access_level' => 'admin'];
        }
        if($projectServices->insight) {
            $service ['insight'] =  ['access_level' => 'admin'];
        }
        return  $service;
    }

    public function checkUserExists($projectServices) {
        $useExists = false;
        if($projectServices->document_management) {
            $useExists = true;
        }else if($projectServices->is_project_admin) {
            $useExists = true;
        } else if($projectServices->insight) {
            $useExists = true;
        }
        return $useExists;
    }

    public function updateBimService($services, $projectId, $isUserExists = false)
    {
        $project = Project::find($projectId);
        $employee = Employees::find($this->id);
        $project_id = $project->bim_id;
        $data = [
            'email' => $employee->email,
            'services' => $services,
            "company_id" => env('BIMDEFAULTCOMPANY'),
            "industry_roles" => []
        ];
        $userApi = new  Bim360UsersApi();
        $userJson = $userApi->getUser(env('BIMACCOUNTADMIN'));
        $userObj =  json_decode($userJson);
       
        $projectApi = new  Bim360ProjectsApi();
        if(!$isUserExists) {
            $input = json_encode([$data]);
            $result = $projectApi->importUser($project_id, $input, $userObj->uid);
        } else {
            $input = json_encode($data);
            $result = $projectApi->updateProjectService($project_id, $employee->bim_id , $input, $userObj->uid);
        }
        Log::info("result {$result}");
    }

    public function updateBim() {
        Flash::success('Profile information updated successfully');
        return redirect(route('employee.index'));
    }

    public function next()    {
        $this->currentStep = $this->currentStep + 1;
    }
    public function back()    {
        $this->currentStep = $this->currentStep -1;
    }

       /**
     * Write code on Method
     *
     * @return response()
     */
    public function goTo($wizard)
    {
        switch ($wizard) {
            case 'sharepoint':
                $this->currentStep = 2;
                break;
            case 'bim':
                $this->projects = $this->getProjectList();
                $this->currentStep = 3;
                break;
            default:
                $this->currentStep = 1;
                break;
        }  
    }


    public function updateBimUser($employee)
    {
        try {
            Log::info('Bim user creation start');
            $input        = [];
            $api          = new  Bim360UsersApi();
            $input["company_id"] = env('BIMDEFAULTCOMPANY');
            $input["email"]      = $employee->email;
            $input['bim_id']     = $employee->bim_id ?? Null;
            $input["nickname"]   = $employee->display_name;
            $input["first_name"] = $employee->first_name;
            $input["last_name"]  = $employee->last_name;
            $roleName = Role::find($employee->job_role)->name;
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
            $updateUser = json_encode(['status'=> 'active', 'default_role'=> $roleName, 'company_id'=> env('BIMDEFAULTCOMPANY')]);
            $result = $api->editUser($employee->bim_id,  $updateUser);
            Log::info("result {$result}");
            Log::info('Bim user creation end');
            return $employee->save();
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
       
    }
     
    public function render()
    {
        return view('livewire.employee.edit.wizard');
    }
}