<?php

namespace App\Repositories;

use App\Interfaces\PrecastEstimationInterface;
use App\Models\PrecastEstimation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PrecastEstimationRepository implements PrecastEstimationInterface {
    protected $model;

    public function __construct(PrecastEstimation $precastEstimation)
    {
        $this->model = $precastEstimation;
    }

    public function all() 
    {
        return $this->model->get();
    }

    public function create(array $data)
    {
        return $this->model->updateOrCreate($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        $precastEstimate = $this->model->find($id);
        return $precastEstimate->delete();
    }

    public function find($id)
    {
        if (null == $precastEstimate = $this->model->find($id)) {
            throw new ModelNotFoundException("Service not found");
        }
        return $precastEstimate;
    }

    public function updateStatus($id)
    {
        if (null ==  $precastEstimate = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $precastEstimate->is_active =  !$precastEstimate->is_active;
        $precastEstimate->save();
        return  $precastEstimate;
    }

}