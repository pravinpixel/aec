<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'first_Name',
        'last_name',
        'user_name',
        'password',
        'job_role',
        'number',
        'email',
        'image',
        'status',
        'share_access',
        'bim_access',
        'access',        
    ];
    
}
