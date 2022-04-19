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
        'status',
        'address_one',
        'address_two',
        'time_zone',
        'status',
        'linked_to_customer',
        'created_by',
        'updated_by',
    ];

    public function setCreatedByAttribute()
    {
        $this->attributes['created_by'] = Admin()->id ?? null;
    }

    // public function setUpdatedByAttribute()
    // {
    //     $this->attributes['updated_by'] = Admin()->id ?? null;
    // }

    public function teamSetup()
    {
        return $this->hasMany(ProjectTeamSetup::class, 'project_id', 'id');
    }

    public function invoicePlan()
    {
        return $this->hasOne(InvoicePlan::class,'project_id','id');
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = GlobalService::DBDateFormatWithTime($value);
    }
    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = GlobalService::DBDateFormatWithTime($value);
    }
}
