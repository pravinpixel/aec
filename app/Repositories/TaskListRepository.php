<?php

namespace App\Repositories;

use App\Interfaces\TaskListRepositoryInterface;
use App\Models\TaskList;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskListRepository implements TaskListRepositoryInterface {
    protected $model;

    public function __construct(TaskList $taskList)
    {
        $this->model = $taskList;
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
        $taskList = $this->model->find($id);
        $taskList->delete();
    }


    public function find($id)
    {
        if (null == $taskList = $this->model->find($id)) {
            throw new ModelNotFoundException("taskList not found");
        }
        return $taskList;
    }
    
    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
}