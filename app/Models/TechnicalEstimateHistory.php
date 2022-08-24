<?php

namespace App\Models;

use App\Models\Admin\Employees;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalEstimateHistory extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => "datetime:Y-m-d h-i-s A",
        'updated_at' => "datetime:Y-m-d h-i-s A",
    ];

    public $fillable = [
        'enquiry_id',
        'technical_estimate_id',
        'history',
        'created_by',
        'role_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class,'created_by','id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
