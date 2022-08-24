<?php

namespace App\Http\Livewire\Employee;

use App\Models\Admin\Employees;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laracasts\Flash\Flash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $id;
    public $password;
    public $password_confirmation;

    public function __construct()
    {
        $this->id = Route::current()->parameter('id');
    }

    public function changePassword()
    {
        $this->validate([
            'password' => 'required|confirmed|min:8',
        ]);
        $employee = Employees::findOrFail($this->id);
        $employee->password = Hash::make($this->password);
        if($employee->save()) {
            Flash::success(__('auth.password_change_successful'));
            redirect(route('employee.index'));
        }
        Flash::error(__('global.something'));
        redirect(route('employee.index'));
    }
    
    public function render()
    {
        $employee = Employees::find($this->id);
        if(!$employee ) {
            abort(404);
        }
        return view('livewire.employee.change-password');
    }
}
