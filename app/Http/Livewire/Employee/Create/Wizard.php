<?php

namespace App\Http\Livewire\Employee\Create;

use App\Helper\Bim360\Bim360ProjectsApi;
use App\Helper\Bim360\Bim360UsersApi;
use App\Models\Admin\Employees;
use App\Models\AecUsers;
use App\Models\EmployeeBimAccessProject;
use App\Models\EmployeeSharePointMasterFolder;
use App\Models\Project;
use App\Models\Role;
use App\Models\sharePointMasterFolder;
use App\Services\GlobalService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;
use Livewire\Component;

class Wizard extends Component
{
    public $first_name;
    public $last_name;
    public $full_name;
    public $email;
    public $job_role;
    public $location;
    public $job_title;
    public $department;
    public $mobile_number;
    public $user_password;
    public $currentStep        = 1;
    public $successMessage     = '';
    public $sharePointAccess   = [];
    public $share_point_status = 0;
    public $password;
    public $share_folder_name  = null;
    public $sign_in_password_change = 0;
    public $send_password_to_email = 0;
    public $recipient_email;
    public $completed_wizard = 0;
    public $roles = [];
    public $projects = [];
    public $country_code = '47';
    public $activeFolder = [];

    public function getEnquiryNumber()
    {
        if (Session::has('employee')) {
            $employee_number = Session::get('customer_enquiry_number');
            Log::info("Session already exists {$employee_number}");
        } else {
            $employee_number = GlobalService::getEmployeeNumber();
            GlobalService::updateConfig('EMP');
            Log::info("New session created {$employee_number}");
        }
        return  $employee_number;
    }

    public function storePersonalInformation()
    {
        if ($this->country_code == '47') {
            $pattern = "regex:/^\d{8}$|^\d{12}$/";
            $customMessages = [
                'regex' => 'Mobile no between 8 to 12 digits',
            ];
        } elseif ($this->country_code == '91') {
            $pattern = "regex:/^[0-9]{10}+$/";
            $customMessages = [
                'regex' => 'Invalid Phone Number',
            ];
        }

        if (Session::has('employee')) {
            $session_employee = Session::get('employee');
            $employee = Employees::find($session_employee->id);
            $this->validate([
                'email'         => ['required', 'email', Rule::unique('employees')->ignore($employee->id)],
                'job_role'      => ['required'],
                'first_name'    => ['required'],
                'last_name'     => ['required'],
                'full_name'  => ['required', Rule::unique('employees')->ignore($employee->id)],
                'mobile_number' => ['required', $pattern, Rule::unique('employees')->ignore($employee->id)],
            ], $customMessages);
            if ($this->password) {
                $this->validate([
                    'password'    => ['required', 'min:8'],
                ]);
            }
        } else {
            $this->validate([
                'email'         => ['required', 'email', Rule::unique('employees')],
                'job_role'      => ['required'],
                'first_name'    => ['required'],
                'last_name'     => ['required'],
                'full_name'  => ['required', Rule::unique('employees')],
                'password'      => ['required', 'min:8'],
                'mobile_number' => ['required', $pattern]
            ], $customMessages);
            $AecUsers = AecUsers::create([
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
                'full_name'  => $this->full_name,
                'email'      => $this->email,
                'password'   => Hash::make($this->password),
                'image'      => "https://picsum.photos/200",
                'job_role'   => $this->job_role
            ]);
            $employee = new Employees();
            $employee->reference_number = $this->getEnquiryNumber();
            $employee->aec_user_id = $AecUsers->id;
            // if ($employee->send_password_to_email) {
                // try {
                $details = [
                    'user_name' => $this->full_name,
                    'email'     => $this->email,
                ];
                Mail::to($this->email)->send(new \App\Mail\EmployeeMail($details));
                // } catch (\Exception $e) {
                //     Log::info($e->getMessage());
                // }
            // }
        }
        $employee->first_name              = $this->first_name;
        $employee->last_name               = $this->last_name;
        $employee->full_name               = $this->full_name;
        $employee->email                   = $this->email;
        $employee->location                = $this->location;
        $employee->job_title               = $this->job_title;
        $employee->job_role                = $this->job_role;
        $employee->department              = $this->department;
        $employee->mobile_number           = $this->mobile_number;
        $employee->country_code            = $this->country_code;
        $employee->image                   = 'no_image.jpg';
        $employee->password                = Hash::make($this->password);
        $employee->sign_in_password_change = $this->sign_in_password_change ?? 0;
        $employee->send_password_to_email  = $this->send_password_to_email ?? 0;
        $employee->recipient_email         = $this->recipient_email;
        $employee->completed_wizard        = $this->completed_wizard;
        $employee->status                  = 1;
        $employee->save();
        $this->createBimUser($employee);
        Session::put('employee',  $employee);
        $this->currentStep = 2;
        $this->completed_wizard = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function storeSharePointAccess()
    {
        if (Session::has('employee')) {
            $session_employee = Session::get('employee');
            $employee = Employees::find($session_employee->id);
            $employee->completed_wizard = 2;
            $this->completed_wizard = 2;
            $employee->save();
        }
        $this->currentStep = 3;
        $this->projects = $this->getProjectList();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        if (Session::has('employee')) {
            $session_employee = Session::get('employee');
            $employee = Employees::find($session_employee->id);
            $employee->completed_wizard = 3;
            $this->completed_wizard = 3;
            $employee->save();
            Session::forget('employee');
        }
        Flash::success(__('global.inserted'));
        return redirect(route('employee.index'));
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
                if (Session::has('employee')) {
                    $session_employee = Session::get('employee');
                    $this->activeFolder       = EmployeeSharePointMasterFolder::where('employee_id', $session_employee->id)->pluck('share_point_master_folder_id')->toArray();
                }
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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back()
    {
        $this->currentStep = $this->currentStep - 1;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->first_name   = '';
        $this->last_name    = '';
        $this->full_name = '';
        $this->user_name    = '';
        $this->domains      = '';
        $this->email        = '';
        $this->location     = '';
        $this->job_title    = '';
        $this->department   = '';
        $this->mobile_number = '';
    }

    public function mount()
    {
        Session::forget('employee');
        if (Session::has('employee')) {
            $session_employee = Session::get('employee');
            $employee = Employees::find($session_employee->id);
            $this->first_name              = $employee->first_name;
            $this->last_name               = $employee->last_name;
            $this->full_name            = $employee->full_name;
            $this->email                   = $employee->email;
            $this->job_role                = $employee->job_role;
            $this->job_title               = $employee->job_title;
            $this->department              = $employee->department;
            $this->mobile_number            = $employee->mobile_number;
            $this->sign_in_password_change = $employee->sign_in_password_change;
            $this->send_password_to_email  = $employee->send_password_to_email;
            $this->recipient_email         = $employee->recipient_email;
            $this->share_point_status      = $employee->share_point_status;
            $this->activeFolder = EmployeeSharePointMasterFolder::where('employee_id', $session_employee->id)->pluck('share_point_master_folder_id')->toArray();
        }
        $this->sharePointAccess   = sharePointMasterFolder::with('employeeSharepointMasterFolder')->get();
        $this->roles = Role::all();
    }



    public function updateFolderAccess($folderId, $employee = null)
    {
        $session_employee = Session::get('employee');
        $employee = EmployeeSharePointMasterFolder::where([
            'share_point_master_folder_id' => $folderId,
            'employee_id' => $session_employee->id
        ])->first();
        if (is_null($employee)) {
            $employee = new  EmployeeSharePointMasterFolder();
            $employee->share_point_master_folder_id = $folderId;
            $employee->employee_id = $session_employee->id;
            $employee->save();
        } else {
            $sharepoint = sharePointMasterFolder::find($folderId);
            $sharepoint->employees()->detach($session_employee->id);
        }
        $this->sharePointAccess   = sharePointMasterFolder::with('employeeSharepointMasterFolder')->get();
        $this->activeFolder = EmployeeSharePointMasterFolder::where('employee_id', $session_employee->id)->pluck('share_point_master_folder_id')->toArray();
    }

    public function updatedSharePointStatus($value)
    {
        $session_employee = Session::get('employee');
        $employee        = Employees::findOrFail($session_employee->id);
        $employee->share_point_status = !$employee->share_point_status;
        $employee->save();
    }



    public function generatePassword()
    {
        $this->user_password === true ? $this->password = rand(0000000000, 9999999999) :  $this->password = '';
    }

    public function createBimUser($employee)
    {
        try {
            Log::info('Bim user creation start');
            $input        = [];
            $api          = new  Bim360UsersApi();
            $input["company_id"] = env('BIMDEFAULTCOMPANY');
            $input["email"]      = $employee->email;
            $input["nickname"]   = $employee->full_name;
            $input["first_name"] = $employee->first_name;
            $input["last_name"]  = $employee->last_name;
            $roleName = Role::find($employee->job_role)->name;
            if (isset($employee->bim_id) && !empty($employee->bim_id)) {
                $editJson = json_encode($input);
                $result = $api->editUser($employee->bim_id, $editJson);
            } else {
                $createJson = json_encode($input);
                $result = $api->createUser($createJson);
            }
            Log::info("result {$result}");
            $response = json_decode($result);
            $employee->bim_id =  $response->id;
            $employee->bim_account_id =  $response->account_id;
            $updateUser = json_encode(['status' => 'active',  'default_role' => $roleName, 'company_id' => env('BIMDEFAULTCOMPANY')]);
            $result = $api->editUser($employee->bim_id,  $updateUser);
            Log::info("result {$result}");
            Log::info('Bim user creation end');
            return $employee->save();
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }

    public function getProjectList()
    {
        $session_employee = Session::get('employee');
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
            and `aec_employee_bim_access_projects`.`employee_id` = {$session_employee->id})
    left join `aec_employees` on
        `aec_employees`.`id` = `aec_employee_bim_access_projects`.`employee_id`
    left join `aec_roles` on 
        `aec_roles`.`id` = `aec_employees`.`job_role`
    where
        `aec_projects`.`bim_id` is not null");
    }

    public function updateAccessStatus($projectId)
    {
        $session_employee = Session::get('employee');
        $employee = Employees::with('role')->find($session_employee->id);
        $employeeBimProjects = EmployeeBimAccessProject::where(['employee_id' => $employee->id, 'project_id' => $projectId])->first();
        if (!$employeeBimProjects) {
            $employeeBimProjects = new EmployeeBimAccessProject();
            $employeeBimProjects->employee_id = $employee->id;
            $employeeBimProjects->project_id = $projectId;
            $employeeBimProjects->access_status = 1;
        } else {
            $employeeBimProjects->access_status = !$employeeBimProjects->access_status;
        }
        $employeeBimProjects->save();
        if ($employeeBimProjects->access_status) {
        }
        $this->projects = $this->getProjectList();
    }

    public function updateServices($service, $projectId)
    {
        $session_employee = Session::get('employee');
        $employeeBimProjects = EmployeeBimAccessProject::where(['employee_id' => $session_employee->id, 'project_id' => $projectId])->first();
        if (!$employeeBimProjects) {
            $employeeBimProjects = new EmployeeBimAccessProject();
            $employeeBimProjects->employee_id = $session_employee->id;
            $employeeBimProjects->project_id = $projectId;
            $employeeBimProjects->{$service} = 1;
            $userExists = false;
        } else {
            $employeeBimProjects->{$service} = !$employeeBimProjects->{$service};
            $userExists = $this->checkUserExists($employeeBimProjects);
        }
        $employeeBimProjects->save();
        if ($employeeBimProjects->access_status) {
            $services = $this->getActiveServices($employeeBimProjects);
            $this->updateBimService($services, $projectId,  $userExists);
        }
        $this->projects = $this->getProjectList();
    }

    public function getActiveServices($projectServices)
    {
        $service = [];
        if ($projectServices->document_management) {
            $service['document_management'] = ['access_level' => $projectServices->is_project_admin ? 'admin' : 'user'];
        }
        if ($projectServices->is_project_admin) {
            $service['project_administration'] = ['access_level' => 'admin'];
        }
        if ($projectServices->insight) {
            $service['insight'] =  ['access_level' => 'admin'];
        }
        return  $service;
    }

    public function checkUserExists($projectServices)
    {
        $useExists = false;
        if ($projectServices->document_management) {
            $useExists = true;
        } else if ($projectServices->is_project_admin) {
            $useExists = true;
        } else if ($projectServices->insight) {
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
        $input = json_encode($data);
        $projectApi = new  Bim360ProjectsApi();
        if (!$isUserExists) {
            $result = $projectApi->importUser($project_id, $input, $userObj->uid);
        } else {
            $result = $projectApi->updateProjectService($project_id, $employee->bim_id, $input, $userObj->uid);
        }
        Log::info("result {$result}");
    }


    public function render()
    {
        return view('livewire.employee.create.wizard');
    }
}
