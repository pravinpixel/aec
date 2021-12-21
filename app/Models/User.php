<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends EloquentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    public function __construct() {
        parent::__construct();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile_no',
        'profile_image',
        'enquiry_number',
        'company_name',
        'contact_person',
        'enquiry_date',
        'remarks'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setFullNameAttribute()
    {
        $this->attributes['full_name'] = "{$this->attributes['first_name']} {$this->attributes['last_name']}";
    }
}
