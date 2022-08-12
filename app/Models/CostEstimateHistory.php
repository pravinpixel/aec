<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostEstimateHistory extends Model
{
    use HasFactory;
    
    protected $casts = [
        'created_at' => "datetime:Y-m-d -h-i-s A",
        'updated_at' => "datetime:Y-m-d -h-i-s A",
    ];

    public $fillable = [
        'enquiry_id',
        'cost_estimate_id',
        'type',
        'history',
        'created_by',
    ];
}
