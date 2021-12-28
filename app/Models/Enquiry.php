<?php

namespace App\Models;

use App\Services\GlobalService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquiry_date',
        'enquiry_number',
        'company_name',
        'contact_person',
        'mobile_no',
        'secondary_mobile_no',
        'customer_id',
        'service_id',
        'building_type_id',
        'delivery_type_id',
        'project_type_id',
        'project_name',
        'project_date',
        'place',
        'site_address',
        'country',
        'zipcode',
        'state',
        'no_of_building',
        'project_delivery_date',
        'status',
        'created_by',
        'updated_by'
    ];

    public function getProjectDateAttribute($value)
    {
        return GlobalService::DBDateFormat($value);
    }

    public function getProjectDeliveryDateAttribute($value)
    {
        return GlobalService::DBDateFormat($value);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function documentTypes()
    {
        return $this->belongsToMany(DocumentType::class)->withTimestamps();
    }

}

