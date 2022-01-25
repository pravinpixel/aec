<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface LayerTypeRepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
    public function getLayerTypeByComponentId($building_component_id, $layer_id);
    public function get($request);
}