<?php

namespace App\Http\Livewire\Employee\Create;

use App\Models\admin\Employees;
use App\Models\Admin\SharePointAccess;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Wizard extends Component
{
    public $first_name;
    public $last_name;
    public $display_name;
    public $user_name;
    public $domains;
    public $email;
    public $location;
    public $job_title;
    public $department;
    public $mobile_phone;
    public $currentStep        = 1;
    public $successMessage     = '';
    public $sharePointAccess   = null;
    public $share_point_status;
    public $share_folder_name  = null;
    
    public function storePersonalInformation()
    {
        $validatedData = $this->validate([
            'email'        => ['required', Rule::unique('employees')->ignore($this->id)],
            'display_name' => ['required', Rule::unique('employees')->ignore($this->id)],
            'user_name'    => ['required', Rule::unique('employees')->ignore($this->id)],
        ]); 
        $this->sharePointAccess = SharePointAccess::all();
        $this->currentStep = 2;
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function storeSharePointAccess()
    {
        $this->validate([
            'share_point_status' => 'required',
            'share_folder_name' => 'required',
        ]);
        
        $this->currentStep = 3;
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        Employees::create([
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'display_name' => $this->display_name,
            'user_name'    => $this->user_name,
            'domains'      => $this->domains,
            'email'        => $this->email,
            'location'     => $this->location,
            'job_title'    => $this->job_title,
            'department'   => $this->department,
            'mobile_phone' => $this->mobile_phone,
        ]);
        $this->successMessage = 'Created Success !.';
        $this->clearForm();
        $this->currentStep = 1;
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
        $this->mobile_phone = '';
    }

    public function render()
    {
        $employee_data = Employees::all();
        return view('livewire.employee.create.wizard',[
            'employee_data' => $employee_data,
        ]);
    }
}
