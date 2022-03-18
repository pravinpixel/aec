<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
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
        'no_of_building',
        'project_name',
        'mobile_number',
        'start_date',
        'delivery_date',
        'status'
    ];
}
