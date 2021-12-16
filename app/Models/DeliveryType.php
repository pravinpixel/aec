<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryType extends Model
{
    use HasFactory, SoftDeletes;

    public $fillabel = [
        'delivery_type_name',
        'is_active'
    ];
}
