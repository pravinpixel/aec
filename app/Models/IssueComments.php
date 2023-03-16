<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'sender_name',
        'sender_role',
        'sender_read_status',

        'reciver_id',
        'reciver_name',
        'reciver_role',
        'reciver_read_status',

        'comment',
    ];
}
