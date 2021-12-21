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
        'order_id',
        'is_active'
    ];
}
