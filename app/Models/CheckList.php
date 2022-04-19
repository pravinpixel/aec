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
} 