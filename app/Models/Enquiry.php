<?php

namespace App\Models;

use App\Services\GlobalService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Enquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'enquiry_date',
        'enquiry_number',
        'customer_enquiry_number',
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
        'project_status',
        'country',
        'zipcode',
        'state',
        'no_of_building',
        'project_delivery_date',
        'building_component_process_type',
        'status',
        'is_active',
        'project_info',
        'service',
        'ifc_model_upload',
        'building_component',
        'additional_info',
        'created_by',
        'updated_by',
        'technical_estimation_status',
        'cost_estimation_status',
        'proposal_sharing_status',
        'customer_response_status',
        'from_enquiry_id'
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

    public function getEnquiryDateAttribute($value)
    {
        return GlobalService::DBDateFormat($value);
    }

    public function setProjectDateAttribute($value)
    {
        $this->attributes['project_date'] = GlobalService::DBDateFormatWithTime($value);
    }

    public function setProjectDeliveryDateAttribute($value)
    {
        $this->attributes['project_delivery_date'] = GlobalService::DBDateFormatWithTime($value);
    }

    public function setEnquiryDateAttribute($value)
    {
        $this->attributes['enquiry_date'] = GlobalService::DBDateFormatWithTime($value);
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

    public function documentTypeEnquiries()
    {
        return $this->hasMany(DocumentTypeEnquiry::class, 'enquiry_id', 'id');
    }

    public function getProposal()
    {
        return $this->hasMany(Admin\MailTemplate::class, 'enquirie_id', 'id');
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

    public function enquiryBuildingComponentDocument()
    {
        return $this->hasOne(EnquiryBuildingComponentDocument::class);
    }

    public function comments()
    {
        return $this->hasMany(EnquiryComments::class);
    }

    public function replicateRow()
    {
        $clone = $this->replicate();
        if($clone->status != 'Closed'){
            return  false;
        }
        $clone->enquiry_number = GlobalService::enquiryNumber();
        $clone->status = 'Active';
        $clone->from_enquiry_id = $clone->id;
        $clone->push();
        foreach($this->services as $service){
            $clone->services()->create($service->toArray());
        }
        foreach($this->enquiryBuildingComponent  as $buildingComponent) {
            $cloneBuildingComponent = $buildingComponent->replicate();
            $cloneBuildingComponent->enquiry_id = $clone->id;
            $cloneBuildingComponent->push();
            if($cloneBuildingComponent && !empty($buildingComponent->enquiryBuildingComponentDetails)) {
                foreach($buildingComponent->enquiryBuildingComponentDetails as $buildingComponentDetail) {
                    $cloneBuildingComponentDetail =  $buildingComponentDetail->replicate();
                    $cloneBuildingComponentDetail->enquiry_id = $clone->id;
                    $cloneBuildingComponentDetail->enquiry_building_component_id = $cloneBuildingComponent->id;
                    $cloneBuildingComponentDetail->push();
                    if(!empty($buildingComponentDetail->enquiryBuildingComponentLayers)) {
                        foreach($buildingComponentDetail->enquiryBuildingComponentLayers as $buildingComponentLayer) {
                            $cloneBuildingComponentLayer = $buildingComponentLayer->replicate();
                            $cloneBuildingComponentLayer->enquiry_id     = $clone->id;
                            $cloneBuildingComponentLayer->enquiry_bcd_id = $cloneBuildingComponentDetail->id;
                            $cloneBuildingComponentLayer->push();
                        }
                    }
                }
            }                            
        }
        foreach($this->documentTypeEnquiries as $documentTypeEnquiry){
            $clone->documentTypeEnquiries()->create(collect($documentTypeEnquiry)->except('id')->toArray());
        }
        foreach($this->comments as $comment){
            $clone->comments()->create($comment->toArray());
        }
        if($clone->save()) {
            GlobalService::updateConfig('ENQ');
            return true;
        }
        return false;
    }
        
}

