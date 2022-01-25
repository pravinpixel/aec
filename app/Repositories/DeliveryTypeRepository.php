<?php

namespace App\Repositories;

use App\Interfaces\DeliveryTypeRepositoryInterface;
use App\Models\BuildingType;
use App\Models\DeliveryType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeliveryTypeRepository implements DeliveryTypeRepositoryInterface{
    protected $model;

    public function __construct(DeliveryType $deliveryType)
    {
        $this->model = $deliveryType;
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
        if (null == $deliveryType = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Type not found");
        }
        return $deliveryType;
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
}