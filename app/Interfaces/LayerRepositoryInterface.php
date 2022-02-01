<?php

namespace App\Interfaces;

interface LayerRepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function update(array $data, $id);
    public function delete($id);
    public function updateStatus($id);
    public function find($id);
    public function get($request);
    public function getByBuildingComponentId($id);
    public function updateOrCreate($data);
}