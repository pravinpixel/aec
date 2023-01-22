<?php

namespace App\Models;

use App\Models\Admin\Employees;
use App\Models\Admin\EmployeeSharePointAcess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sharePointMasterFolder extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','status'
    ];
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
    ];
    public function projects(){
        return $this->belongsToMany(projects::class,'projects_folders','fid','pid');
    }

    public function employees()
    {
        return $this->belongsToMany(Employees::class, 'employee_share_point_master_folder', 'share_point_master_folder_id','employee_id')
                    ->withPivot('employee_id');
    }

    public function employeeSharepointMasterFolder()
    {
        return $this->hasOne(EmployeeSharePointMasterFolder::class);
    }

}
