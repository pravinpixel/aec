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

    public function assignUser($enquiry, $user_id,  $assign_for = null)
    {
        $technicalEstimate = $this->model->where('enquiry_id', $enquiry->id)->first();
        $technicalEstimate->assign_to = $user_id;
        $technicalEstimate->assign_by = Admin()->id;
        $technicalEstimate->assign_for = $assign_for;
        $technicalEstimate->assign_for_status = 0;
        return $technicalEstimate->save();
    }
}