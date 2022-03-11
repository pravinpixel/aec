<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeamSetup extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'employee_id',
        'add',
        'edit',
        'delete',
        'view',
        'comments',
        'delete'
    ];
}
