<?php

namespace App\Repositories;

use App\Interfaces\BuildingComponentRepositoryInterface;
use App\Models\BuildingComponent;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BuildingComponentRepository implements BuildingComponentRepositoryInterface{
    protected $model;

    public function __construct(BuildingComponent $buildingComponent)
    {
        $this->model = $buildingComponent;
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
        $projectType = $this->model->find($id);
         $projectType->is_active=2;
         $projectType->save();
         return $projectType->delete();
    }
    public function updateStatus($id)
    {
        // return $this->model->find($id);
        // $module->is_active = !$module->is_active;
        if (null ==  $buildingComponent = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $buildingComponent->is_active =  !$buildingComponent->is_active;
        $buildingComponent->save();
        return  $buildingComponent;
        
    }
    public function find($id)
    {
        if (null == $buildingComponent = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Component not found");
        }
        return $buildingComponent;
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
}