<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryCostEstimate extends Model
{
    use HasFactory;
    protected $fillable = [
        'build_json',
        'total_cost',
        'enquiry_id',
        'created_by',
        'updated_by'
    ]; 
}