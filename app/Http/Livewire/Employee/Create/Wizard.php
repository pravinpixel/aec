<?php

namespace App\Http\Livewire\Employee\Create;

use App\Models\Admin\SharePointAccess;
use App\Models\EmployeeBimAccessProject;
use App\Models\Project;
use App\Models\Role;
use App\Services\GlobalService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class Wizard extends Component
{
    public $currentStep     = 1;
    public $successMessage  = '';

    public $sharePointAccess = null, $email , $number , $display_name = "Prabhu", $email_id = "123" , $first_name, $create_password = 'off';
    public $share_point_status = 0 , $file_name = [];
    public $file_index;

    public function storePersonalInformation()
    {
        // $validatedData = $this->validate([
        //     'email'         =>  ['required', Rule::unique('employee')->ignore($this->id)->whereNull('deleted_at')],
        //     'number'        =>  ['required', Rule::unique('employee')->ignore($this->id)->whereNull('deleted_at')],
        // ]); 
        
        $this->sharePointAccess = SharePointAccess::all();
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
        // $validatedData = $this->validate([
        //     'stock' => 'required',
        //     'status' => 'required',
        // ]);
   
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
        Employee::create([
            'employee_id' => $this->name,
            'amount' => $this->amount,
            'description' => $this->description,
            'stock' => $this->stock,
            'status' => $this->status,
        ]);
        $this->successMessage = 'Product Created Successfully.';
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
        $this->employee_id = '';
        $this->amount      = '';
        $this->description = '';
        $this->stock       = '';
        $this->status      = '';
    }


    public function render()
    {
        $employee_data = Employee::all();
        return view('livewire.employee.create.wizard',[
            'employee_data' => $employee_data,
        ]);
    }
}
