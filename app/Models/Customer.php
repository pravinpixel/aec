<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $dates = ['created_at', 'updated_at', 'enquiry_date'];
    public $guarded = ['*'];
    use HasFactory;
}
