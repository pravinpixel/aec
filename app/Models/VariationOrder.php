<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'title',
        'hours',
        'price',
        'description'
    ];
    
    public function Issues(){
        return $this->belongsTo(Issues::class,'issue_id','id');
    }
}