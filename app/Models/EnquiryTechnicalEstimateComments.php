<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryTechnicalEstimateComments extends Model
{
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];
    use HasFactory;
}
