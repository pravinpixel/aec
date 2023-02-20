<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveProjectSubSubTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_order',
        'assign_to',
        'status',
        'start_date',
        'end_date',
        'delivery_date',
        'project_id',
        'progress_percentage',
    ];
}
