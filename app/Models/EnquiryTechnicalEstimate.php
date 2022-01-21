<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryTechnicalEstimate extends Model
{
    use HasFactory;

    public function buildingComponent()
    {
        return $this->belongsTo(BuildingComponent::class);
    }
}
