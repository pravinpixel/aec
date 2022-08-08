<?php

namespace App\Repositories;

use App\Interfaces\CheckSheetInterface;
use App\Models\CheckSheet;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CheckSheetRepository implements CheckSheetInterface
{
    protected $model;

    public function __construct(CheckSheet $checkSheet)
    {
        $this->model = $checkSheet;
    }

    public function all()
    {
        return $this->model->get();
    }

    public function create(array $data)
    {
        return $this->model->updateOrCreate($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        $checkSheet = $this->model->find($id);
        return $checkSheet->delete();
    }

    public function find($id)
    {
        if (null == $checkSheet = $this->model->find($id)) {
            throw new ModelNotFoundException("Service not found");
        }
        return $checkSheet;
    }

    public function updateStatus($id)
    {
        if (null ==  $checkSheet = $this->model->find($id)) {
            throw new ModelNotFoundException("Status Not Updated");
        }
        $checkSheet->is_active =  !$checkSheet->is_active;
        $checkSheet->save();
        return  $checkSheet;
    }
}
