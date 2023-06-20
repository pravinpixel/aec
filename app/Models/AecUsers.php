<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AecUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'image',
        'job_role',
    ];

    public function Role()
    {
        return $this->hasOne(Role::class, 'id', 'job_role');
    }
}
