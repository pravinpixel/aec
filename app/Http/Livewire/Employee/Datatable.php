<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
 


class Datatable extends Component
{
    
    public function render()
    {
        $employee_data = Employee::paginate(10);
        return view('livewire.employee.datatable',[
            "employee_data" =>  $employee_data
        ]);
    }
}
