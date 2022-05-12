<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\BuildingType;
use App\Models\DeliveryType;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleRepository implements RoleRepositoryInterface{
    protected $model;

    public function __construct(Role  $role)
    {
        $this->model =  $role;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
         $role = $this->model->find($id);
         $role->status=2;
         $role->save();
         return $role->delete();
    }
    public function updateStatus($id)
    {
        // return $this->model->find($id);
        // $module->is_active = !$module->is_active;
        if (null ==  $role = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $role->status =  !$role->status;
        $role->save();
        return  $role;
        
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function find($id)
    {
        $roles = Employee::where('job_role', $id)->get();
        return  $roles;
    }

    public function getRoleBySlug($name)
    {
        $role = $this->model->where('slug', $name)->first();
        if(!empty($role)) {
            return Employee::where('job_role', $role->id)->get();
        }
        return [];
    }
}