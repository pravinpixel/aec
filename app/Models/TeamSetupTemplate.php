<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamSetupTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'template_name',
        'template_data'
    ];
}
