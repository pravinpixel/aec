<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LayerType extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
    public $fillable = [
        'building_component_id',
        'layer_id',
        'layer_type_name',
        'is_active',
    ];
}
