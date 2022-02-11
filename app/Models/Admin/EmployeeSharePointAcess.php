<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EmployeeSharePointAcess extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'id';
    public $fillable = [
        'employee_id',
        'administration_status',
        'business_status',
        'sales_status',
        'projects_status',
        'engineering_status',
        'subsea_projects_status',
        'is_active',
    ]; 
}
