<?php

namespace App\Interfaces;
interface DocumentTypeRepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find($id);
    public function updateStatus($id);
    public function mandatory($id);
    public function findByName($name);
    public function findBySlug($slug);
    public function getMandatoryField();
    public function get($request);
}