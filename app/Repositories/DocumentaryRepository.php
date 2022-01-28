<?php

namespace App\Repositories;

use App\Interfaces\DocumentaryRepositoryInterface;
use App\Models\Documentary;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DocumentaryRepository implements DocumentaryRepositoryInterface{
    protected $model;

    public function __construct(Documentary $documentary)
    {
        $this->model = $documentary;
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
        $documentary = $this->model->find($id);
         $documentary->is_active=2;
         $documentary->save();
         return $documentary->delete();
    }

    public function status($id)
    {
        // return $this->model->find($id);
        // $module->is_active = !$module->is_active;
        if (null ==  $documentary = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $documentary->is_active =  !$documentary->is_active;
        $documentary->save();
        return  $documentary;
        
    }

    public function find($id)
    {
        if (null == $documentary = $this->model->find($id)) {
            throw new ModelNotFoundException("Building Component not found");
        }
        return $documentary;
    }

    public function get($request)
    {
        return $this->model->where('is_active',1)->get();
    }
}