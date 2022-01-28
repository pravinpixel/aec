<?php

namespace App\Models\Documentary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentary extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        // 'building_component_name',
        // 'building_component_icon',
        // 'order_id',
        // 'is_active'
    ];
}
