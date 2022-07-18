<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostEstimateTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'json',
        'type',
        'created_by'
    ];

    public function setCreatedByAttribute($value) {
        $this->attributes['created_by'] = Admin()->id;
    }
}
