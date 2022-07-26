<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAssignToUser extends Model
{
    protected $fillable = [
        'enquiry_id',
        'assign_by',
        'assign_to'
    ];
    
    use HasFactory;
}
