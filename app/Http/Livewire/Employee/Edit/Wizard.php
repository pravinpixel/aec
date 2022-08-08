<?php

namespace App\Http\Livewire\Employee\Edit;

use App\Models\Admin\Employees;
use App\Models\Admin\SharePointAccess;
use App\Models\Role;
use App\Services\GlobalService;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Wizard extends Component
{
    use WithFileUploads;

    public $employee_id, $display_name, $first_name, $last_name, $job_title, $email, $image, $number;
    public $currentStep        = 1;
    public $share_point_status = 0;
    public $successMessage     = '';
    public $sharePointAccess   = null;
    public $employees;
    public $roles = [];
    public  $id;
    public $is_uploaded;
    public $uploaded_image;

    public function __construct()
    {
        $this->id = Route::current()->parameter('id');
    }

    public function mount() {
        $employee          = Employees::findOrFail($this->id);
        $this->reference_number = $employee->reference_number;
        $this->display_name     = $employee->display_name;
        $this->first_name       = $employee->first_name;
        $this->last_name        = $employee->last_name;
        $this->job_title        = $employee->job_title;
        $this->job_role         = $employee->job_role;
        $this->email            = $employee->email;
        $this->image            = $employee->image;
        $this->uploaded_image   = $employee->image;
        $this->mobile_number    = $employee->mobile_number;
        $this->is_uploaded        = true;
        $this->roles = Role::all();
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

    public function updatePersonalInformation()    {
        $employee = Employees::findOrFail($this->id);
        // $uploadPath         =   GlobalService::getEmployeePath();
        // $path               =   $this->image->storePublicly($uploadPath, 'enquiry_uploads');
        $customMessages = [
            'regex' => 'Mobile no between 8 to 12 digits'
        ];
        $this->validate([
            'email'         => ['required','email', Rule::unique('employees')->ignore($employee->id)],
            'job_role'      => ['required'],
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'display_name'  => ['required', Rule::unique('employees')->ignore($employee->id)],
            'mobile_number' => ['required','regex:/^\d{8}$|^\d{12}$/',Rule::unique('employees')->ignore($employee->id)],
        ], $customMessages); 
        $employee->first_name              = $this->first_name;
        $employee->last_name               = $this->last_name;
        $employee->display_name            = $this->display_name;
        $employee->email                   = $this->email; 
        $employee->job_title               = $this->job_title;
        $employee->job_role                = $this->job_role;
        $employee->mobile_number           = $this->mobile_number;
        $this->is_upload                   = false;
        $employee->save();
        $this->next();
    }
    public function updateAccountSettings()    {
        $this->sharePointAccess = SharePointAccess::all();
        $this->next();
    }
    public function updateSharePointAccess()    {
        $this->next();
    }

    public function updateBim()    {
        $this->next();
    }

    public function next()    {
        $this->currentStep = $this->currentStep + 1;
    }
    public function back()    {
        $this->currentStep = $this->currentStep -1;
    }

    public function render()
    { 
        return view('livewire.employee.edit.wizard');
    }
}