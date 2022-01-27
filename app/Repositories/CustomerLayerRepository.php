<?php

namespace App\Repositories;

use App\Interfaces\CustomerLayerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerLayerRepository implements CustomerLayerRepositoryInterface{
    protected $model;

    public function __construct(Customer $customerLayer)
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
        $buildingComponent = $request->input('building_component_id') ?? null;
        if(!empty(Customer()->id) && !is_null($buildingComponent) ) {
            $customer = $this->model->find(1);
            return  $customer->layers()
                            ->where('layers.building_component_id', $buildingComponent)
                            ->get();
        }
    }
}