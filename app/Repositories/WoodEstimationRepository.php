<?php

namespace App\Repositories;

use App\Interfaces\WoodEstimationInterface;
use App\Models\WoodEstimation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WoodEstimationRepository implements WoodEstimationInterface{
    protected $model;

    public function __construct(WoodEstimation $woodEstimation)
    {
        $this->model = $woodEstimation;
    }

    public function all() 
    {
        return $this->model->where('is_active',1)->get();
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
        $woodEstimate = $this->model->find($id);
        $woodEstimate->is_active=2;
        $woodEstimate->save();
        return $woodEstimate->delete();
    }

    public function find($id)
    {
        if (null == $woodEstimate = $this->model->find($id)) {
            throw new ModelNotFoundException("Service not found");
        }
        return $woodEstimate;
    }

    public function updateStatus($id)
    {
        if (null ==  $woodEstimate = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $woodEstimate->is_active =  !$woodEstimate->is_active;
        $woodEstimate->save();
        return  $woodEstimate;
    }

}