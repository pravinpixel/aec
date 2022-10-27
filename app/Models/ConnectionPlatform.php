<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectionPlatform extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",
    ];
    protected $fillable = [
        'project_id',
        'sharepoint_status',
        'bim_status',
        'tf_office_status'
    ];
}
