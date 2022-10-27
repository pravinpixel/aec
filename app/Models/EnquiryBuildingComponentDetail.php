<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryBuildingComponentDetail extends Model
{
    public $table = 'enquiry_bcds';
    
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
    protected $fillable = [
        'enquiry_building_component_id',
        'building_component_delivery_type_id',
        'floor',
        'exd_wall_number',
        'approx_total_area',
    ];
    
    use HasFactory;

    public function enquiryBuildingComponentLayers()
    {
        return $this->hasMany(EnquiryBuildingComponentLayer::class, 'enquiry_bcd_id', 'id');
    }

    public function deliveryType()
    {
        return $this->belongsTo(DeliveryType::class, 'building_component_delivery_type_id', 'id');
    }
}
