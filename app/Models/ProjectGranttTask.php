<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGranttTask extends Model
{
    use HasFactory;
    protected $fillable = [
        "id"        ,
        "text"      ,
        "duration"  ,
        "progress"  ,
        "start_date",
        "end_date",
        "parent"    ,
        "type"      ,
        "project_id",
        "status",
        "delivery_date"
    ];
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
        'start_date' => "datetime:d/m/Y - h:i:s A",  
        'end_date' => "datetime:d/m/Y - h:i:s A",  
    ];
}