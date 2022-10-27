<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuildingType extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];

    public $fillable = [
        'building_type_name',
        'is_active'
    ];

    public function enquiry()
    {
        return $this->hasOne(Enquiry::class,'building_type_id', 'id');
    }
}
