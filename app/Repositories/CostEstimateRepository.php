<?php

namespace App\Repositories;

use App\Interfaces\CostEstimateRepositoryInterface;
use App\Models\EnquiryCostEstimate;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CostEstimateRepository implements CostEstimateRepositoryInterface{
    protected $model;

    public function __construct(EnquiryCostEstimate $costEstimate)
    {
        $this->model = $costEstimate;
    }

    public function assignUser($enquiry, $user_id)
    {
        $costEstimate = $this->model->where('enquiry_id', $enquiry->id)->first();
        $costEstimate->assign_to = $user_id;
        $costEstimate->assign_by = Admin()->id;
        return $costEstimate->save();
    }
}