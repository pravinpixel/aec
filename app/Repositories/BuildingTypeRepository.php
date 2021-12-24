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
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $buildingType = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Type not found");
        }
        return $buildingType;
    }
}