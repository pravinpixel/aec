<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CostEstimationCalculation extends Model
{
    use HasFactory,SoftDeletes;
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];
    protected $table = 'cost_estimation_calculation';
    protected $primaryKey = 'id';
    protected $fillable = [
        'estimation_detail_id',
        'Component',
        'type',
        'sqm',
        'complexity',
        'detail_price',
        'detail_sum',
        'statistic_price',
        'statistic_sum',
        'cad_cam_price',
        'cad_cam_sum',
        'logistic_price',
        'logistic_sum',
        'total_price',
        'total_sum',
        'status',
    ];
}
