<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketcommentsReplay extends Model
{
    protected $table = '_ticket_comments_replays';
    use HasFactory;
    protected $fillable = [ 'project_id','project_ticket_id', 'comments', 'created_by','send_by', 'seen_user','role_id', 'status'];

   

    
}


