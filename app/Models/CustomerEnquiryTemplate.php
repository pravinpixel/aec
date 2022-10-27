<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEnquiryTemplate extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];
    protected $guarded = ['*'];
    protected $fillable = [
        "template_name",
        "building_component_id",
        "template",
        "customer_id",
    ];
}
