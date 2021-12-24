<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $dates  = [
            'created_at', 
            'updated_at', 
            'enquiry_date'
    ];
    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'email',
        'password',
        'mobile_no',
        'company_name',
        'contact_person',
        'remarks',
        'is_active',
        'created_by',
        'updated_by'
    ];

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
}
