<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveProjectGranttTask extends Model
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
}
