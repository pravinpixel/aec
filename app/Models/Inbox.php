<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_role',
        'sender_id',
        'receiver_role',
        'receiver_id',
        'module_name',
        'module_id',
        'menu_name',
        'message',
        'read_status'
    ];
}
