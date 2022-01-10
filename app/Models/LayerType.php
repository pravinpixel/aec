<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayerType extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = [
        'building_component_id',
        'layer_id',
        'layer_name',
        'is_active',
    ];
}
