<?php

namespace App\Http\Livewire\Employee\Edit;

use App\Models\Admin\SharePointAccess;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;

class Wizard extends Component
{
    use WithFileUploads;

    public $employee_id, $display_name, $first_Name, $last_name, $job_title, $email, $image, $number;
    public $currentStep        = 1;
    public $share_point_status = 0;
    public $successMessage     = '';
    public $sharePointAccess   = null;
    public $employees;
    
    public function mount() { // ComponentDidMount
        $employees          = Employee::findOrFail(session()->get('employee_id'));
        $this->employee_id  = $employees->employee_id;
        $this->display_name = $employees->user_name;
        $this->first_Name   = $employees->first_Name;
        $this->last_name    = $employees->last_name;
        $this->job_title    = $employees->job_title;
        $this->email        = $employees->email;
        $this->image        = $employees->image;
        $this->number       = $employees->number;
    }
    
    public function updatePersonalInformation()    {
        // $this->validate([
        //     'display_name' => ['required'],
        //     'last_name'    => ['required'],
        //     'first_Name'    => ['required'],
        //     'job_title'    => ['required'],
        //     'email'        => ['required'],
        //     'image'        => ['required'],
        //     'number'       => ['required'],
        // ]);
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