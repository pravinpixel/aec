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
        'project_id',
        'progress_percentage',
        'parent',
        'chart_task_id',
        'task_id'
    ];
    public function SubSubTasks()
    {
        return $this->hasMany(LiveProjectSubSubTasks::class,'sub_task_id','id')->orderBy('sort_order');
    }
}
