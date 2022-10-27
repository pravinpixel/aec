<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstimationComponent extends Model
{
    use HasFactory,SoftDeletes;
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
    protected $table = 'building_component';
    protected $primaryKey = 'id';
    protected $fillable = [
        'component',
        'status'
    ];
}
