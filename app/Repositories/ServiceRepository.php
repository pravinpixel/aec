<?php

namespace App\Repositories;

use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceRepository implements ServiceRepositoryInterface{
    protected $model;

    public function __construct(Service $service)
    {
        $this->model = $service;
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
        if (null == $service = $this->model->find($id)) {
            throw new ModelNotFoundException("Service not found");
        }
        return $service;
    }
}