<?php

namespace App\Models;

use App\Services\GlobalService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryBuildingComponentDocument extends Model
{
    use HasFactory;
    
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
