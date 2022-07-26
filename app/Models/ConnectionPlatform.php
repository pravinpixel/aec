<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectionPlatform extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'sharepoint_status',
        'bim_status',
        'tf_office_status'
    ];
}
