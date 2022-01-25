<?php

namespace App\Repositories;

use App\Interfaces\CustomerLayerRepositoryInterface;
use App\Models\CustomerLayer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerLayerRepository implements CustomerLayerRepositoryInterface{
    protected $model;

    public function __construct(CustomerLayer $customerLayer)
    {
        $this->model = $customerLayer;
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
        if (null == $customerLayer = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Type not found");
        }
        return $customerLayer;
    }

    public function get($request)
    {
        return $this->model->with(['layer'])->where('is_active',1)->get();
    }
}