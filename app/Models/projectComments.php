<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectComments extends Model
{
    use HasFactory;
    protected $fillable  = [
        'external',
        'internal',
        'action_by',
        'project_id'
    ];
}
