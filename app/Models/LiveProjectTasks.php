<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveProjectTasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'progress_percentage',
        'project_id',
    ];
    public function SubTasks()
    {
        return $this->hasMany(LiveProjectSubTasks::class,'task_id','id');
    }
}
