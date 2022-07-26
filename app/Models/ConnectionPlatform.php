<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectionPlatform extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'share_point_access_id',
        'is_access',
        'connection_url'
    ];
}
