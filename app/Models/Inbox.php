<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    protected $fillable = [
        'sender_role',
        'sender_id',
        'receiver_role',
        'receiver_id',
        'module_name',
        'module_id',
        'menu_name',
        'message',
        'read_status',
        'send_date'
    ];
}