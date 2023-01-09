<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveProjectGranttLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'type',
        'source',
        'target',
    ];
}
