<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    use HasFactory;

    protected $fillable =[ 
        'name',
        'is_active',
        'task_list',
        'task_list_category'
    ];

    public function getTaskList(){
        return $this->hasOne(TaskList::class, 'id', 'task_list_category');
    }

    public function getTaskListGroupBy(){
        return $this->hasOne(TaskList::class, 'id', 'task_list_category')->groupBy('task_list_name');
    }
} 