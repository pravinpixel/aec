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

    
}


