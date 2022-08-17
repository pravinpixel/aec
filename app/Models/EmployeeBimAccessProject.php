<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBimAccessProject extends Model
{
    use HasFactory;

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
