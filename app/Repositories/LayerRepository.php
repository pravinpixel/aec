<?php

namespace App\Repositories;

use App\Interfaces\LayerRepositoryInterface;
use App\Models\Layer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LayerRepository implements LayerRepositoryInterface{
    protected $model;

    public function __construct(Layer $layer)
    {
        $this->model = $layer;
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
        if (null == $layer = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Component not found");
        }
        return $layer;
    }
}