<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuildingComponent extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'label',
        'building_component_name',
        'building_component_icon',
        'order_id',
        'top_position',
        'bottom_position',
        'is_active',
        'cost_estimate_status'
    ];

    public function layers()
    {
        return $this->hasMany(Layer::class);
    }
}
