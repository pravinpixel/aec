<?php

namespace App\Http\Livewire\Employee\Create;

use App\Helper\Bim360\Bim360ProjectsApi;
use App\Helper\Bim360\Bim360UsersApi;
use App\Models\Admin\Employees;
use App\Models\Admin\SharePointAccess;
use App\Models\Role;
use App\Services\GlobalService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;
use Livewire\Component;

class Wizard extends Component
{
    public $first_name;
    public $last_name;
    public $display_name;
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

    public function getEnquiryNumber() 
    {
        if (Session::has('employee')){
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
        $customMessages = [
            'regex' => 'Mobile no between 8 to 12 digits'
        ];
        if(Session::has('employee')) {
            $session_employee = Session::get('employee');
            $employee = Employees::find($session_employee->id);
            $this->validate([
                'email'         => ['required','email', Rule::unique('employees')->ignore($employee->id)],
                'job_role'      => ['required'],
                'first_name'    => ['required'],
                'last_name'     => ['required'],
                'display_name'  => ['required', Rule::unique('employees')->ignore($employee->id)],
                'mobile_number' => ['required','regex:/^\d{8}$|^\d{12}$/',Rule::unique('employees')->ignore($employee->id)],
            ], $customMessages); 
            if ($this->password) {
                $this->validate([
                    'password'    => ['required','min:8'],
                ]); 
            }
        } else {
            $this->validate([
                'email'         => ['required','email', Rule::unique('employees')],
                'job_role'      => ['required'],
                'first_name'    => ['required'],
                'last_name'     => ['required'],
                'display_name'  => ['required', Rule::unique('employees')],
                'password'      => ['required','min:8'],
                'mobile_number' => ['required','regex:/^\d{8}$|^\d{12}$/']
            ], $customMessages); 
            $employee = new Employees();
            $employee->reference_number = $this->getEnquiryNumber();
        }
        $employee->first_name              = $this->first_name;
        $employee->last_name               = $this->last_name;
        $employee->display_name            = $this->display_name;
        $employee->email                   = $this->email; 
        $employee->location                = $this->location;
        $employee->job_title               = $this->job_title;
        $employee->job_role                = $this->job_role;
        $employee->department              = $this->department;
        $employee->mobile_number            = $this->mobile_number;
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
        if(Session::has('employee')) {
            $session_employee = Session::get('employee');
            $employee = Employees::find($session_employee->id);
            $employee->completed_wizard = 2;
            $this->completed_wizard = 2;
            $employee->save();
        }
        $this->currentStep = 3;
        $bimProject = new Bim360ProjectsApi();
        $result = $bimProject->getProjectList();
        $this->projects = json_decode($result);
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        if(Session::has('employee')) {
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
                $this->currentStep = 2;
                break;
            case 'bim':
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
        $this->currentStep = $this->currentStep -1;    
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
        $this->display_name = '';
        $this->user_name    = '';
        $this->domains      = '';
        $this->email        = '';
        $this->location     = '';
        $this->job_title    = '';
        $this->department   = '';
        $this->mobile_number = '';
    }

    public function mount() {
        Session::forget('employee');
        if(Session::has('employee')) {
            $session_employee = Session::get('employee');
            $employee = Employees::find($session_employee->id);
            $this->first_name              = $employee->first_name;
            $this->last_name               = $employee->last_name;
            $this->display_name            = $employee->display_name;
            $this->email                   = $employee->email;
            $this->job_role                = $employee->job_role;
            $this->job_title               = $employee->job_title;
            $this->department              = $employee->department;
            $this->mobile_number            = $employee->mobile_number;
            $this->sign_in_password_change = $employee->sign_in_password_change;
            $this->send_password_to_email  = $employee->send_password_to_email;
            $this->recipient_email         = $employee->recipient_email;
        }
        $this->sharePointAccess = SharePointAccess::all();
        $this->roles = Role::all();
    }
    

    public function generatePassword()
    {
        $this->user_password === true ? $this->password = rand(0000000000, 9999999999) :  $this->password = '';
    }

    public function createBimUser($employee)
    {
        Log::info('Bim user creation start');
        $input        = [];
        $api          = new  Bim360UsersApi();
        $input["company_id"] = env('BIMDEFAULTCOMPANY');
        $input["email"]      = $employee->email;
        $input['bim_id']     = $employee->bim_id ?? Null;
        $input["nickname"]   = $employee->display_name;
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
        $updateUser = json_encode(['status'=> 'active', 'company_id'=> env('BIMDEFAULTCOMPANY')]);
        $result = $api->editUser($employee->bim_id,  $updateUser);
        Log::info("result {$result}");
        Log::info('Bim user creation end');
        return $employee->save();
    }

    public function render()
    {
        return view('livewire.employee.create.wizard');
    }
}
