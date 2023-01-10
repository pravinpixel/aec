<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveProjectSubSubTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'assign_to',
        'status',
        'start_date',
        'end_date',
        'delivery_date',
        'progress_percentage',
    ];
}
