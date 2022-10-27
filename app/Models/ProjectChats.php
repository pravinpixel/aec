<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectChats extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'type', 'created_by', 'comments', 'file_id', 'status', 'send_by', 'role_by','seen_by','reference_id','version'];
    protected $casts = [
        'created_at' => "datetime:d/m/Y - h:i:s A",
        'updated_at' => "datetime:d/m/Y - h:i:s A",  
    ];
}
