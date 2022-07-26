<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuildingComponent extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'building_component_name',
        'building_component_icon',
        'order_id',
        'is_active'
    ];

    public function layers()
    {
        return $this->hasMany(Layer::class);
    }
}
