<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryCostEstimate extends Model
{
    use HasFactory;
    
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
    protected $fillable = [
        'assign_for_status',
        'assign_for',
        'build_json',
        'precast_build_json',
        'total_cost',
        'enquiry_id',
        'created_by',
        'updated_by'
    ]; 
}