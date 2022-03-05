<?php

namespace App\Repositories;

use App\Interfaces\TechnicalEstimateRepositoryInterface;
use App\Models\EnquiryTechnicalEstimate;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TechnicalEstimateRepository implements TechnicalEstimateRepositoryInterface{
    protected $model;

    public function __construct(EnquiryTechnicalEstimate $technicalEstimate)
    {
        $this->model = $technicalEstimate;
    }

    public function assignUser($enquiry_id, $user_id)
    {
        $technicalEstimate = $this->model->where('enquiry_id', $enquiry_id)->first();
        $technicalEstimate->assign_to = $user_id;
        $technicalEstimate->assign_by = Admin()->id;
        return $technicalEstimate->save();
    }
}