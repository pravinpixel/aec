<?php

namespace App\Interfaces;
interface UserRepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function setRole(string $name);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
}