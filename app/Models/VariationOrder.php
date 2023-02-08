<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'hours',
        'price',
        'description'
    ];
}
