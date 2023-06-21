<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\GlobalService;

class Project extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'customer_id',
        'enquiry_id',
        'building_type_id',
        'project_type_id',
        'delivery_type_id',
        'reference_number',
        'company_name',
        'email',
        'contact_person',
        'site_address',
        'zipcode',
        'country',
        'state',
        'city',
        'language',
        'no_of_building',
        'project_name',
        'mobile_number',
        'start_date',
        'delivery_date',
        'address_one',
        'address_two',
        'time_zone',
        'status',
        'linked_to_customer',
        'created_by',
        'updated_by',
        'gantt_chart_data',
        'is_submitted',
        'is_move_to_customer_input_folder',
        'wizard_create_project', 
        'wizard_connect_platform', 
        'wizard_teamsetup',  
        'wizard_invoice_plan', 
        'wizard_todo_list',
        'bim_project_type',
        'wizard_status',
        'is_new_project',
        'bim_id',
        'bim_account_id',
        'progress_percentage',
        'share_point_folder_link'
    ];

    public function setCreatedByAttribute()
    {
        $this->attributes['created_by'] = Admin()->id;
    }

    public function setWizardStatusAttribute($value)
    {
        $this->attributes['wizard_status'] = json_encode($value);
    }

    public function getWizardStatusAttribute($value)
    {
       return json_decode($value);
    }

    public function deliveryType()
    {
        return $this->belongsTo(DeliveryType::class);
    }

    public function customerdatails()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function teamSetup()
    {
        return $this->hasMany(ProjectTeamSetup::class, 'project_id', 'id');
    }

    public function invoicePlan()
    {
        return $this->hasOne(InvoicePlan::class,'project_id','id');
    }
    public function Customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = GlobalService::DBDateFormatWithTime($value);
    }
    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = GlobalService::DBDateFormatWithTime($value);
    }

    public function sharepointFolder()
    {
        return $this->hasOne(SharepointFolder::class,'project_id','id');
    }

    public function connectPlatform()
    {
        return $this->hasOne(connectPlatform::class,'project_id','id');
    }

    public function comments()
    {
        return $this->hasMany(ProjectChats::class);
    }
    public function folders(){
        return $this->belongsToMany(sharePointMasterFolder::class,'projects_folders','pid','fid');
    }
    public function GranttTasks()
    {
        return $this->hasMany(LiveProjectGranttTask::class,'project_id','id');
    } 
    public function GranttLinks()
    {
        return $this->hasMany(LiveProjectGranttLink::class,'project_id','id');
    } 
    public function LiveProjectTasks()
    {
        return $this->hasMany(LiveProjectTasks::class,'project_id','id');
    }
    public function LiveProjectParentTasks()
    {
        return $this->hasMany(LiveProjectTasks::class,'project_id','id')->where('parent',0);
    }
    public function Issues()
    {
        return $this->hasMany(Issues::class,'project_id','id');
    } 
    public function IssuesCount($status)
    { 
        return $this->hasMany(Issues::class,'project_id','id')->where('status', $status)->count();
    }
    public function projectComments()
    {
        return $this->hasOne(projectComments::class,'project_id','id');
    }
    public function projectClosure()
    {
        return $this->hasMany(projectClosure::class,'project_id','id');
    }
    public function enquiry()
    {
        return $this->hasOne(Enquiry::class,'id','enquiry_id');
    }
}