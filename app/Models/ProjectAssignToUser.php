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
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
    ];
    use HasFactory;
}
