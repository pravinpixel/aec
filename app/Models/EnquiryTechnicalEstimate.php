<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryTechnicalEstimate extends Model
{
    use HasFactory;
    protected $fillable = [
        'assign_for_status',
        'assign_for',
        'build_json',
        'enquiry_id',
        'updated_by'
    ];
    public function buildingComponent()
    {
        return $this->belongsTo(BuildingComponent::class);
    }
}
