<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalEstimateHistory extends Model
{
    use HasFactory;

    public $fillable = [
        'enquiry_id',
        'technical_estimate_id',
        'history',
        'created_by',
    ];
}
