<?php

namespace App\Repositories;

use App\Interfaces\OutputTypeRepositoryInterface;
use App\Models\OutputType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OutputTypeRepository implements OutputTypeRepositoryInterface{
    protected $model;

    public function __construct(OutputType $outputType)
    {
        $this->model = $outputType;
    }

    public function all()
    {
        return $this->model->with('services')->get();
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
        if (null == $outputType = $this->model->find($id)) {
            throw new ModelNotFoundException("Service not found");
        }
        return $outputType;
    }

    public function get($request)
    {
        return $this->model->with('services')->where('is_active',1)->get();
    }
}