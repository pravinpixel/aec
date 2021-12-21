<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuildingComponentDeliveryType extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = [
        'delivery_type_name',
        'is_active'
    ];
}
