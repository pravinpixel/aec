<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectChats extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'type', 'created_by', 'comments', 'file_id', 'status', 'send_by', 'role_by','seen_by','reference_id','version'];
 
}
