<?php

namespace App\Models;

use App\Services\GlobalService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

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
        'is_active',
        'project_info',
        'service',
        'ifc_model_upload',
        'building_component',
        'created_by',
        'updated_by'
    ];

    public function getCreatedAtAttribute($date)
    {
        return  Carbon::parse($date)->format(Config::get('global.model_date_format'));
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format(Config::get('global.model_date_format'));
    }

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
        return $this->belongsToMany(DocumentType::class)
                        ->whereNull('document_type_enquiry.deleted_at')
                        ->withPivot('id','file_name','status','file_type','client_file_name','approved_by','date','created_at','updated_at')
                        ->withTimestamps();
    }

    function enquiryBuildingComponent()
    {
        return $this->hasMany(EnquiryBuildingComponent::class, 'enquiry_id', 'id');
    }

    public function buildingType()
    {
        return $this->belongsTo(BuildingType::class);
    }

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function deliveryType()
    {
        return $this->belongsTo(DeliveryType::class);
    }
}

