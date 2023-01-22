<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeSharePointMasterFolder extends Pivot
{
    use HasFactory;
    
    public function sharePointMasterFolder()
    {
        return $this->belongsTo(sharePointMasterFolder::class,'share_point_master_folder', 'id');
    }
}
