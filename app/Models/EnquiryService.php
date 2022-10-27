<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryService extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A", 
    ];

    
}
