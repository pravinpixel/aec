<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'user_id',
        'comment',
        'unread'
    ];
}
