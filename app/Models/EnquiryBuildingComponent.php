<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryBuildingComponent extends Model
{
    use HasFactory;
    protected $fillable = [
        'enquiry_id',
        'building_component_id'
    ];

    public function enquiryBuildingComponentDetails()
    {
        return $this->hasMany(EnquiryBuildingComponentDetail::class, 'enquiry_building_component_id', 'id');
    }
}
