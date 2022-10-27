<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrecastEstimation extends Model
{
    use HasFactory, SoftDeletes;
    
    public $fillable = [
        'name',
        'hours',
        'is_active'
    ];
    
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
}
