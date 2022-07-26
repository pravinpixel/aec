<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostEstimateHistory extends Model
{
    use HasFactory;

    public $fillable = [
        'enquiry_id',
        'cost_estimate_id',
        'type',
        'history',
        'created_by',
    ];
}
