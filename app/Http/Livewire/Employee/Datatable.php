<?php

namespace App\Http\Livewire\Employee;

use App\Models\Admin\Employees;
use Livewire\Component;

class Datatable extends Component
{
    
    public function render()
    {
        $employee_data = Employees::paginate(10);
        return view('livewire.employee.datatable',[
            "employee_data" =>  $employee_data
        ]);
    }
}
