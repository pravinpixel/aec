<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'id',
        'reference_number',
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
        'mobile_number',
        'recipient_email',
        'sign_in_password_change',
        'send_password_to_email',
        'password',
        'job_role',
        'image',
        'status',
        'bim_access',
        'bim_id',
        'bim_account_id',
        'bim_uid',
        'completed_wizard',
        'created_by'
    ];
}
