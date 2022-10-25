<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Customer extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $dates  = [
            'created_at', 
            'updated_at', 
            'enquiry_date'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'customer_enquiry_date',
        'customer_enquiry_no',
        'reference_enquiry_no',
        'first_name',
        'last_name',
        'full_name',
        'email',
        'password',
        'mobile_no',
        'phone_no',
        'invoice_email',
        'fax',
        'website',
        'company_name',
        'organization_no',
        'contact_person',
        'remarks',
        'postal_code',
        'city',
        'state',
        'country',
        'is_active',
        'created_by',
        'updated_by',
        'device_token',
        'notification',
        'bim_id',
        'bim_account_id',
        'image',
        'token'
    ];
    public function assigncustomerdetails()
    {
        return $this->hasOne(TicketComments::class,'assigned','id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
        $first_name = $this->attributes['first_name'] ?? $this->attributes['contact_person'] ?? "";
        $last_name = $this->attributes['last_name'] ?? "";
        if(isset($first_name)) {
            $this->attributes['full_name'] = "{$first_name} {$last_name}";
        }
    }

    public function setContactPersonAttribute($contactPerson)
    {
        $this->attributes['contact_person'] = $contactPerson;
        $this->attributes['full_name']      = $contactPerson;
        $this->attributes['first_name']     = $contactPerson;
    }
    

    public function getContactPersonAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCompanyNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function enquiry()
    {
        return $this->hasMany(Enquiry::class, 'customer_id', 'id');
    }
   
    
    public function latestEnquiry()
    {
        return $this->hasOne(Enquiry::class, 'customer_id', 'id')->latest();
    }

    public function layers()
    {
        return $this->belongsToMany(Layer::class)
                        ->wherePivot('is_active',1)
                        ->withTimestamps();
    }

    public function customerdatails()
    {
        return $this->hasOne(Project::class,'customer_id','id');
    }

}
