<?php

namespace App\Models;

use App\Services\GlobalService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnquiryBuildingComponentDocument extends Model
{
    use HasFactory,  SoftDeletes;
    
    public function getCreatedAtAttribute($value)
    {
        return GlobalService::DBDateFormat($value);
    }
    public function getUpdatedtAttribute($value)
    {
        return GlobalService::DBDateFormat($value);
    }
    
    protected $fillable = [
        'enquiry_id',
        'customer_id',
        'file_path',
        'file_name',
        'file_type'
    ];
}
