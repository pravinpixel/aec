<?php

namespace App\Repositories;

use App\Interfaces\LayerTypeRepositoryInterface;
use App\Models\LayerType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LayerTypeRepository implements LayerTypeRepositoryInterface{
    protected $model;

    public function __construct(LayerType $layerType)
    {
        $this->model = $layerType;
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
        if (null == $layerType = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Component not found");
        }
        return $layerType;
    }

    public function getLayerTypeByComponentId($building_component_id, $layer_id)
    {
        return $this->model->where(['building_component_id' => $building_component_id, 'layer_id' => $layer_id])->get();
    }
}