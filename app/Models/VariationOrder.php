<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
    ];
    
    public function Issues(){
        return $this->belongsTo(Issues::class,'issue_id','id');
    }
    public function VariationOrderVersions(){
        return $this->hasMany(VariationOrderVersions::class,'variation_id','id');
    }
}