<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function update(array $data, $id);
    public function delete($id);
    public function updateStatus($id);
    public function find($id);
    public function show($id);
    public function getRoleBySlug($name);
}