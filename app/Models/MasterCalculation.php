<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterCalculation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'master_calculation';
    protected $primaryKey = 'id';
    public $fillable = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at',
        'component_id',
        'type_id',
        'status',
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
        'total_sum'
    ];

    public function setTotalSumAttribute() {
        $columns = config('global.master_calculation_column');
        $totals = collect($columns)->map(function($item, $key){
           return $this->attributes[$item];
        });
        $this->attributes['total_sum'] = $totals->sum();
    }
}
