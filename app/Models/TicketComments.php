<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComments extends Model
{
    use HasFactory;
    protected $fillable = [ 'project_id','type', 'created_by', 'summary','description', 'file_id', 'assigned','priority','ticket_date','status', 'send_by', 'role_by','seen_by'];

    public function assigndetails()
    {
        return $this->belongsTo(Employee::class, 'assigned', 'id');
    }

    public function requesterdetails()
    {
        return $this->belongsTo(Employee::class, 'send_by', 'id');
    }

    
}


