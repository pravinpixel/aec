<?php

namespace App\Repositories;

use App\Interfaces\ProjectTypeRepositoryInterface;
use App\Models\BuildingType;
use App\Models\DeliveryType;
use App\Models\ProjectType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectTypeRepository implements ProjectTypeRepositoryInterface{
    protected $model;

    public function __construct(ProjectType  $projectType)
    {
        $this->model =  $projectType;
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
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null ==  $projectType = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Type not found");
        }
        return  $projectType;
    }
}