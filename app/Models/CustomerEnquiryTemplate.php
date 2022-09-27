<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEnquiryTemplate extends Model
{
    use HasFactory;
    protected $guarded = ['*'];
    protected $fillable = [
        "template_name",
        "building_component_id",
        "template",
        "customer_id",
    ];
}
