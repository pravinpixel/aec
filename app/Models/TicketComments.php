<?php

namespace App\Models;

use App\Models\Admin\Employees;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComments extends Model
{
    use HasFactory;
    protected $dates = ['ticket_date'];
    protected $fillable = [ 'project_id','ticket_num','type', 'requester','variation_order','showing','created_by', 'updated_by','summary','description', 'file_id', 'assigned','emp_tag','cus_tag','priority','ticket_date','status', 'project_status','send_by', 'role_by','seen_by','is_active'];
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
        'ticket_date' => "datetime:d/m/Y - h:i:s A",  
    ];
    public function assigndetails()
    {
        return $this->belongsTo(Employees::class, 'assigned', 'id');
    }
    public function assigncustomerdetails(){
        return $this->belongsTo(Customer::class, 'assigned', 'id');
    }

    public function requesterdetails()
    {
        return $this->belongsTo(Employees::class, 'send_by', 'id');
    }
    public function TicketcommentsReplay()
    {
        if(!empty(Customer()->id)){
            $seen_user = 'Customer';
        }else{
            $seen_user = 'Admin';
        }
        return $this->hasMany(TicketcommentsReplay::class, 'project_ticket_id', 'id')
                    ->where('status',0)
                    ->Where('seen_user',$seen_user)
                    ;
    }

    
}


