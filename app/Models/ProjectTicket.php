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
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
        'change_date' => "datetime:d/m/Y - h:i:s A",  
    ];
}
