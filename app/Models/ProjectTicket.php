<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTicket extends Model
{ 
    use HasFactory;
    protected $fillable = [
        'project_id',
        'ticket_comment_id',
        'title',
        'description',
        'response',
        'change_date',
        'project_hrs',
        'project_price',
        'total_price',
        'status',
        'variation_status',
        'action_comment',
        'variation_email_status',
        'is_mail_sent',
        'is_sent',
        'customer_response',
        'is_active',
    ];
}
