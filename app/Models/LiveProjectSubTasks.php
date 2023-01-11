<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveProjectSubTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'progress_percentage'
    ];
    public function SubSubTasks()
    {
        return $this->hasMany(LiveProjectSubSubTasks::class,'sub_task_id','id');
    }
}
