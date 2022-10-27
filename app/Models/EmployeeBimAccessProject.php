<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBimAccessProject extends Model
{
    use HasFactory;


    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    

    protected $fillable = [
        'project_id',
        'employee_id',
        'access_status',
        'role',
        'is_project_admin',
        'document_management',
        'design_collaboration',
        'insight'
    ];
}
