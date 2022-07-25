<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable =[
        'employee_id',
        'first_name',
        'last_name',
        'display_name',
        'user_name',
        'domains',
        'email',
        'location',
        'job_title',
        'department',
        'mobile_phone',
        'password'
    ];
}
