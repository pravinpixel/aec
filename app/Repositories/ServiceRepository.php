<?php

namespace App\Repositories;

use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Service;
use App\Models\Output;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceRepository implements ServiceRepositoryInterface{
    protected $model;

    public function __construct(Service $service)
    {
        $this->model = $service;
    }

    public function all()
    {
        // return $this->model->all();
        // $users =1;

        $users = $this->model->select(
            "services.id", 
            "services.service_name",
            "services.output_type_id", 
            "services.is_active", 
            "output_types.output_type_name",
        
        )
        ->leftJoin("output_types", "output_types.id", "=", "services.output_type_id")
        ->get();
        return $users;
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
        $service = $this->model->find($id);
         $service->is_active=2;
         $service->save();
         return $service->delete();
    }
    public function updateStatus($id)
    {
        // return $this->model->find($id);
        // $module->is_active = !$module->is_active;
        if (null ==  $service = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $service->is_active =  !$service->is_active;
        $service->save();
        return  $service;
        
    }

    public function find($id)
    {
        if (null == $service = $this->model->find($id)) {
            throw new ModelNotFoundException("Service not found");
        }
        return $service;
    }
    
    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
}