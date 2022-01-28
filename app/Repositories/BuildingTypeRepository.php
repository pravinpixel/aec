<?php

namespace App\Repositories;

use App\Interfaces\BuildingTypeRepositoryInterface;
use App\Models\BuildingType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BuildingTypeRepository implements BuildingTypeRepositoryInterface{
    protected $model;

    public function __construct(BuildingType $buildingType)
    {
        $this->model = $buildingType;
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
        if (null ==  $projectType = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $projectType->is_active =  !$projectType->is_active;
        $projectType->save();
        return  $projectType;
        
    }

    public function find($id)
    {
        if (null == $buildingType = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Type not found");
        }
        return $buildingType;
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
}