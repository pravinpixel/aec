<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTodo extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'enquiry_id',
        'assign_to',
        'assign_by',
        'task_id',
        'date_of_delivery',
        'status',
    ];
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
        'date_of_delivery' => "datetime:d/m/Y - h:i:s A",  
    ];
}
