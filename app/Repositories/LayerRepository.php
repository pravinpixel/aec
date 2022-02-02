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
        $layer = $this->model->find($id);
        $layer->is_active=2;
        $layer->save();
        return $layer->delete();
    }
    public function updateStatus($id)
    {

        if (null ==  $layer = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $layer->is_active =  !$layer->is_active;
        $layer->save();
        return  $layer;
        
    }

    public function find($id)
    {
        if (null == $layer = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Component not found");
        }
        return $layer;
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }

    public function getByBuildingComponentId($id)
    {
        $adminLayers = $this->model->where([
            'is_active' => 1, 
            'building_component_id' => $id,
            'user_type' => 'admin'
        ])->get()->toArray();
        $customerLayers = $this->model->where([
            'is_active' => 1, 
            'building_component_id' => $id,
            'created_by' => Customer()->id ?? false,
        ])->get()->toArray();
        return array_merge($adminLayers,  $customerLayers);
    }

    public function updateOrCreate($data)
    {
        return $this->model->updateOrCreate([
            'created_by' => Customer()->id,
            'building_component_id' => $data['building_component_id'],
            'user_type' => 'customer',
            'layer_name' => $data['layer_name']
        ], [ ]);
    }
}