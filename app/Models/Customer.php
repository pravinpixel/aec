<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    use HasFactory;
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
        'bim_account_id'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
        $this->attributes['full_name'] = "{$this->attributes['first_name']} {$this->attributes['last_name']}";
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

}
