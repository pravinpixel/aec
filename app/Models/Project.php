<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'enquiry_id',
        'project_name',
        'mobile_number',
        'start_date',
        'delivery_date',
        'status'
    ];
}
