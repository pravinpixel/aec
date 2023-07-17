<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AecUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'job_role', 
        'last_name',
        'full_name',
        'email',
        'password',
        'image'
    ];

    public function Role()
    {
        return $this->hasOne(Role::class, 'id', 'job_role');
    }

    public function Customer()
    {
        return $this->hasOne(Customer::class, 'aec_user_id', 'id');
    }
}
