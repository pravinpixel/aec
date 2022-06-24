<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostEstimationDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cost_estimation_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date',
        'contact',
        'complexity_val',
        'complexity_total',
        'status'
    ];

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class,'id', 'enquiry_id');
    }
    
    public function CostEstimationCalculations () {
        return $this->hasMany(CostEstimationCalculation::class, 'estimation_detail_id','id'); 
    }
}
