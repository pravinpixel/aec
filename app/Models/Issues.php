<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'description',
        'attachments',
        'type',
        'request_id',
        'request_name',
        'assignee_id',
        'assignee_name',
        'priority',
        'due_date',
        'tags',
        'convert_variation_order'
    ];
}
